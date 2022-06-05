<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        return view('backend.templates.subcategory.index', ['subcategorylist' => Subcategory::orderBy('id', 'desc')->get()]);
    }

    public function create()
    {
        return view('backend.templates.subcategory.add',['categorylist' => Category::where(['status'=>1])->orderBy('id', 'desc')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories|max:20',
            'category_id' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,gif|required|max:500',
        ]);
        
        Subcategory::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'slug'          => Str::slug($request->name),
            'status'        => (array_key_exists('status',$request->all()))? 1:0,
            'photo'         => move_file($request->file('photo'),'back/category',Str::slug($request->name))
        ]);
        Session::flash('success', 'Added Successfull.');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view(
            'backend.templates.subcategory.edit',
            [
                'subcategory' => Subcategory::where("id", $id)->first(),
                'categorylist' => Category::where("status", 1)->get()
            ]
        );
    }

    public function view($id)
    {
        return view(
            'backend.templates.subcategory.view',
            [
                'subcategory' => Subcategory::where("id", $id)->first()
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $id,
            'category_id' => 'required'
        ]);
        $data = [
            'name'          => $request->name,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'status'        => (array_key_exists('status',$request->all()))? 1:0,
        ];
        // file upload with checking existence
        if(!empty($request->file('photo'))){
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif|required|max:500',
            ]);
            $category = Subcategory::where("id", $id)->first();
           $data['photo'] = move_file($request->file('photo'),'back/category',Str::slug($request->name),$category->photo);
        }
        // update data by id
        Subcategory::where("id", $id)->update($data);
        Session::flash('success', 'Update Successfully.');
        return redirect()->route("admin.subcategory.list");
    }

    public function destroy($id)
    {
        try {
            Subcategory::where("id", $id)->delete();
            Session::flash('success', 'Delete Successfully.');
        } catch (\Throwable $th) {
            Session::flash('warning', 'You can\'t delete this one, item are added by this category!!');
        }
        return redirect()->back();
    }
 
}

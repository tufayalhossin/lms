<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.templates.category.index', ['categorylist' => Category::orderBy('id', 'desc')->get()]);
    }

    public function create()
    {
        return view('backend.templates.category.add');
    }

    public function store(Request $request)
    {
        dd($request->route());
        dd($request->routes());
        $request->validate([
            'name' => 'required|unique:categories|max:20',
            'photo' => 'mimes:jpg,jpeg,png,gif|required|max:500',
        ]);
        Category::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'slug'          => Str::slug($request->name),
            'status'        => (array_key_exists('status',$request->all()))? 1:0,
            'photo'         => move_file($request->file('photo'),'back/category',Str::slug($request->name)),
            'file_name'     => $request->file('photo')?$request->file('photo')->GetClientOriginalName():null
        ]);
        Session::flash('success', 'Added Successfull.');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view(
            'backend.templates.category.edit',
            [
                'category' => Category::where("id", $id)->get()
            ]
        );
    }

    public function view($id)
    {
        return view(
            'backend.templates.category.view',
            [
                'category' => Category::where("id", $id)->first()
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $id
        ]);
        $data = [
            'name'          => $request->name,
            'description'   => $request->description,
            'status'        => (array_key_exists('status',$request->all()))? 1:0,
        ];
        // file upload with checking existence
        if(!empty($request->file('photo'))){
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif|required|max:500',
            ]);
            $category = Category::where("id", $id)->first();
           $data['photo'] = move_file($request->file('photo'),'back/category',Str::slug($request->name),$category->photo);
           $data['file_name'] = $request->file('photo')?$request->file('photo')->GetClientOriginalName():null;

        }
        // update data by id
        Category::where("id", $id)->update($data);
        Session::flash('success', 'Update Successfully.');
        return redirect()->route("admin.category.list");
    }

    public function destroy($id)
    {
        try {
            Category::where("id", $id)->delete();
            Session::flash('success', 'Delete Successfully.');
        } catch (\Throwable $th) {
            Session::flash('warning', 'You can\'t delete this one, Sub-Category are added by this category!!');
        }
        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.templates.category.index', ['categorylist' => Category::where('status', 1)->orderBy('id', 'desc')->get()]);
    }

    public function create()
    {
        return view('backend.templates.category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:disciplines',
        ]);
        Category::insert([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'created_at' => date('Y-m-d H:m:i'),
        ]);
        Session::flash('success', 'Added Successfull.');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view(
            'backend.templates.category.edit',
            [
                'category' => Category::where("id", $id)->first()
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:disciplines,name,' . $id
        ]);
        // update data by id
        Category::where("id", $id)->update(['name' => $request->name]);
        Session::flash('success', 'Update Successfully.');
        return redirect()->route("user.discipline.all");
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

    public function discipline()
    {
        return view('user.discipline.index', ['disciplinelist' => Category::where('status', 1)->orderBy('id', 'desc')->get()]);
    }
}

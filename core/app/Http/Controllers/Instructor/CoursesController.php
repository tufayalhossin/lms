<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Category;
use App\Models\Subcategory;
class CoursesController extends Controller
{
    public function index(){
        return view('instructor.templates.courses.index',[
            "courselist" => Courses::where(['user_id'=>auth()->user()->id,'status'=>"Published"])->orderBy('id', 'desc')->get()
        ]);
    }
    
    public function create(){
        return view('instructor.templates.courses.add',[
            "categorylist" => Category::where(['status'=>1])->orderBy('id', 'desc')->get()
        ]);
    }
    
    public function intend(){
        return view('instructor.templates.courses.intend');
    }
    public function intend_store(Request $request){
        $request->validate([
            'students_learn' => 'required',
            'requirements' => 'required|max:200',
            'intended_learners' => 'required|max:200',
        ]);
        $data = [
            'students_learn'        => $request->students_learn,
            'intended_learners'     => $request->intended_learners,
            'title'                 => "untitled",
            'status'                => "draft",
        ];
        try {
            Courses::create($data);
            Session::flash('success', 'Added Successfull.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Session::flash('warning', implode($th->getMessage()));
        }
        
        return redirect()->back();
    }
    
}

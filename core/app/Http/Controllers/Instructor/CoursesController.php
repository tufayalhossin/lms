<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;;
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
            'title'             => 'required|max:75',
            'students_learn'    => 'required',
            'requirements'      => 'required|max:200',
            'intended_learners' => 'required|max:200',
        ]);
        $data = [
            'students_learn'        => $request->students_learn,
            'slug'                  => Str::slug($request->title),
            'intended_learners'     => $request->intended_learners,
            'requirements'          => $request->requirements,
            'title'                 => $request->title,
            'user_id'               => auth()->user()->id,
            'created_by'            => auth()->user()->id,
            'status'                => "draft",
        ];

        try {
            $result = Courses::create($data);
            Session::flash('success', 'Course Intend added Successfull.');
            return redirect()->route('instructor.course.create',['operationID'=>$result->id,"slug"=>$result->slug]);
        } catch (\Throwable $th) {
            Session::flash('warning', 'Data is not submit successfull, please try again.');
        }
        return redirect()->back();
    }
    
}

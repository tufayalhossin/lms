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
    
    public function draft(){
        return view('instructor.templates.courses.draft',[
            "courselist" => Courses::where(['user_id'=>auth()->user()->id,'status'=>"draft"])->orderBy('id', 'desc')->get()
        ]);
    }
    
    public function create(){
        return view('instructor.templates.courses.add',[
            "categorylist" => Category::where(['status'=>1])->get()
        ]);
    }
    public function ajaxsubcategory(){
        return  response()->json(Subcategory::where(['status'=>1])->get());
    }
    
    public function intend($id = null){
        // dd(Courses::find($id));
        if($id!=null){
            return view('instructor.templates.courses.intend-edit',[
                'course'=>Courses::find($id)
            ]);
        }else{
            return view('instructor.templates.courses.intend');
        }
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

    public function intend_update(Request $request,$id=null){
     
        $request->validate([
            'title'             => 'required|max:75|min:30',
            'students_learn'    => 'required',
            'requirements'      => 'required|max:200|min:50',
            'intended_learners' => 'required|max:200|min:50',
        ]);
        $data = [
            'students_learn'        => $request->students_learn,
            'intended_learners'     => $request->intended_learners,
            'requirements'          => $request->requirements,
            'title'                 => $request->title,
            'updated_by'            => auth()->user()->id,
        ];

        if(Courses::where('id',$id)->update($data)){
            Session::flash('success', 'Course Intend updated Successfull.');
        }else{
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }
    


    public function store(Request $request){
        dd($request->all());
        $request->validate([
            'title'             => 'required|max:75'
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

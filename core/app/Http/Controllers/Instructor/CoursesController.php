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
            "coursedata" => Courses::where(['id'=>request()->operationID])->first(),
            "categorylist" => Category::where(['status'=>1])->get(),
        ]);
    }


    public function curriculum(){
        return view('instructor.templates.courses.curriculum',[
            "coursedata" => Courses::where(['id'=>request()->operationID])->first(),
        ]);
    }


    public function ajaxsubcategory(Request $request){
        return  response()->json(Subcategory::select(['id','name'])->where(['status'=>1,'category_id'=>$request->id])->get());
    }
    
    public function intend($id = null){
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
            'students_learn'    => 'required',
            'requirements'      => 'required|max:200',
            'intended_learners' => 'required|max:200',
        ]);
        $data = [
            'title'                 => "Untitled Course",
            'students_learn'        => $request->students_learn,
            'intended_learners'     => $request->intended_learners,
            'requirements'          => $request->requirements,
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
            'students_learn'    => 'required',
            'requirements'      => 'required|max:200|min:50',
            'intended_learners' => 'required|max:200|min:50',
        ]);
        $data = [
            'students_learn'        => $request->students_learn,
            'intended_learners'     => $request->intended_learners,
            'requirements'          => $request->requirements,
            'updated_by'            => auth()->user()->id,
        ];

        if(Courses::where('id',$id)->update($data)){
            Session::flash('success', 'Course Intend updated Successfull.');
        }else{
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }
    


    public function store(Request $request,$id){
     
        $request->validate([
            'title'                     => 'required|max:80',
            'sort_description'          => 'required|max:120',
            'description'               => 'required',
            'categories_id'             => 'required',
            'subcategories_id'          => 'required',
            'language_locale'           => 'required',
            'instructional_level'       => 'required',
            'tags'                      => 'required',
            'completion_certificate'    => 'required',
        ]);
     
        $data = [
            'title'                     => $request->title,
            'sort_description'          => $request->sort_description,
            'description'               => $request->description,
            'categories_id'             => $request->categories_id,
            'subcategories_id'          => $request->subcategories_id,
            'language_locale'           => $request->language_locale,
            'instructional_level'       => $request->instructional_level,
            'tags'                      => $request->tags,
            'completion_certificate'    => $request->completion_certificate,
        ];
        
        if(Courses::where('id',$id)->update($data)){
            Session::flash('success', 'Course info updated Successfull.');
        }else{
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }
    
    public function curriculum_store(Request $request,$id){
        dd($request->all());
        $request->validate([
            'title'                     => 'required|max:80',
            'sort_description'          => 'required|max:120',
            'description'               => 'required',
            'categories_id'             => 'required',
            'subcategories_id'          => 'required',
            'language_locale'           => 'required',
            'instructional_level'       => 'required',
            'tags'                      => 'required',
            'completion_certificate'    => 'required',
        ]);
     
        $data = [
            'title'                     => $request->title,
            'sort_description'          => $request->sort_description,
            'description'               => $request->description,
            'categories_id'             => $request->categories_id,
            'subcategories_id'          => $request->subcategories_id,
            'language_locale'           => $request->language_locale,
            'instructional_level'       => $request->instructional_level,
            'tags'                      => $request->tags,
            'completion_certificate'    => $request->completion_certificate,
        ];
        
        if(Courses::where('id',$id)->update($data)){
            Session::flash('success', 'Course info updated Successfull.');
        }else{
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }



}

<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
class CoursesController extends Controller
{
    public function index(){
        $courselist = Courses::where(['user_id'=>auth()->user()->id,'status'=>"Published"])->orderBy('id', 'desc')->get();
        return view('instructor.templates.courses.index',[
            "courselist" => $courselist
        ]);
    }
    
}

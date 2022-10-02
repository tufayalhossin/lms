<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;;

use App\Models\Courses;
use App\Models\Category;
use App\Models\Country;
use App\Models\CourseLessons;
use App\Models\CourseMediaOverviews;
use App\Models\CoursePricetiers;
use App\Models\CoursePromotions;
use App\Models\CourseSections;
use App\Models\Subcategory;

class CoursesController extends Controller
{
    public function index()
    {
        return view('instructor.templates.courses.index', [
            "courselist" => Courses::where(['user_id' => auth()->user()->id, 'status' => "Published"])->orderBy('id', 'desc')->get()
        ]);
    }

    public function draft()
    {
        return view('instructor.templates.courses.draft', [
            "courselist" => Courses::where(['user_id' => auth()->user()->id, 'status' => "draft"])->orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('instructor.templates.courses.add', [
            "coursedata" => Courses::where(['id' => request()->operationID])->first(),
            "categorylist" => Category::where(['status' => 1])->get(),
        ]);
    }


    public function curriculum()
    {
        return view('instructor.templates.courses.curriculum', [
            "coursedata" => Courses::where(['id' => request()->operationID])->first(),
        ]);
    }


    public function ajaxsubcategory(Request $request)
    {
        return  response()->json(Subcategory::select(['id', 'name'])->where(['status' => 1, 'category_id' => $request->id])->get());
    }

    public function intend($id = null)
    {
        if ($id != null) {
            return view('instructor.templates.courses.intend-edit', [
                'course' => Courses::find($id)
            ]);
        } else {
            return view('instructor.templates.courses.intend');
        }
    }


    public function intend_store(Request $request)
    {
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
            return redirect()->route('instructor.course.create', ['operationID' => $result->id, "slug" => $result->slug]);
        } catch (\Throwable $th) {
            Session::flash('warning', 'Data is not submit successfull, please try again.');
        }
        return redirect()->back();
    }

    public function intend_update(Request $request, $id = null)
    {

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

        if (Courses::where('id', $id)->update($data)) {
            Session::flash('success', 'Course Intend updated Successfull.');
        } else {
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }



    public function store(Request $request, $id)
    {

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

        if (Courses::where('id', $id)->update($data)) {
            Session::flash('success', 'Course info updated Successfull.');
        } else {
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }

    public function curriculum_store(Request $request, $id)
    {
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

        if (Courses::where('id', $id)->update($data)) {
            Session::flash('success', 'Course info updated Successfull.');
        } else {
            Session::flash('warning', 'Data is not updated successfull, please try again.');
        }
        return redirect()->back();
    }

    public function section_store(Request $request, $id)
    {
        $request->validate([
            'title'                     => 'required|max:80|unique:course_sections',
        ]);
        $section = CourseSections::where('course_id', $id)->orderby('sortindex', 'desc')->first();
        $data = [
            'title'                 => $request->title,
            'course_id'             => $id,
            'sortindex'             => !empty($section) ? $section->sortindex + 1 : 0,
            'created_by'            => auth()->user()->id,
        ];
        if ($request->id) {

            $data = [
                'title'        => $request->title,
                'updated_by'   => auth()->user()->id,
            ];
            CourseSections::where('id', $request->id)->update($data);
            Session::flash('success', 'Section updated Successfully.');
        } else {
            if (CourseSections::create($data)) {
                Session::flash('success', 'Section added Successfully.');
            } else {
                Session::flash('warning', 'Data is not updated successfull, please try again.');
            }
        }
        return redirect()->back();
    }

    public function section_sort(Request $request, $id)
    {

        $request->validate([
            'position'                     => 'required',
        ]);
        try {
            foreach ($request->position as $key => $value) {
                CourseSections::where('id', $value)->update(['sortindex' => $key]);
            }
            return response()->json(['success' => true, 'message' => "Sorting successfull."], 201);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => "Sorting aren't successfull."], 500);
        }
    }
    public function lesson_sort(Request $request, $id)
    {
        $request->validate([
            'position'                     => 'required',
        ]);
        try {
            foreach ($request->position as $key => $value) {
                CourseSections::where('id', $value)->update(['sortindex' => $key]);
            }
            return response()->json(['success' => true, 'message' => "Sorting successfull."], 201);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => "Sorting aren't successfull."], 500);
        }
    }

    public function section_destroy($course_id, $id)
    {
        try {
            CourseSections::where(["id" => $id, 'course_id' => $course_id])->delete();
            Session::flash('success', 'Delete Successfully.');
        } catch (\Throwable $th) {
            Session::flash('warning', 'You can\'t delete this one');
        }
        return redirect()->back();
    }



    public function lesson($course_id, $id = null)
    {
        $lessondata = CourseLessons::where(['id' => $id])->first();
        return view('instructor.templates.courses.lesson-modal-body', [
            "lessondata" => $lessondata,
            "section_id" => !empty($lessondata) ? $lessondata->section_id : null
        ]);
    }


    public function lesson_store(Request $request, $section_id)
    {
        $request->validate([
            'title'             => 'required|max:100',
        ]);
        $prev_sort_data = CourseLessons::where('section_id', $request->section_id)->orderby('sortindex', 'desc')->first();

        if ($request->lession_id) {
            $data = [
                'title'        => $request->title,
                'lecture_description'   => $request->lecture_description,
                // 'status'                => $request->status,
                'updated_by'   => auth()->user()->id,
            ];
            CourseLessons::where('id', $request->id)->update($data);
            Session::flash('success', 'Section updated Successfully.');
        } else {

            $data = [
                'title'                 => $request->title,
                'lecture_description'   => $request->lecture_description,
                'section_id'            => (int) $request->section_id,
                'status'                => 1,
                'sortindex'             => !empty($prev_sort_data) ? $prev_sort_data->sortindex + 1 : 0,
                'created_by'            => auth()->user()->id,
            ];

            if (CourseLessons::create($data)) {
                Session::flash('success', 'Section added Successfully.');
            } else {
                Session::flash('warning', 'Data is not updated successfull, please try again.');
            }
        }
        return redirect()->back();
    }
    public function resource_store(Request $request, $course_id, $lesson_id)
    {
        $request->validate([
            'type'             => 'required',
            'resourse'         => 'required',
            'duration'         => 'required',
        ]);



        if (isset($request->resourse) && $request->type == 'document') {
            $request->validate([
                'resourse'         => "mimes:pdf,ppt,pptx|max:5130",
            ]);
            $pimage = $request->file('resourse');
            $fileExtention = $pimage->getClientOriginalExtension();
            $uploadPath = 'storage/course/resourses/';
            $imageName = auth()->user()->id . "_" . time() . '.' . $fileExtention;
            $resourse = $uploadPath . $imageName;
            $pimage->move($uploadPath, $imageName);
        } else {
            $resourse = $request->resourse;
        }


        $data = [
            'lesson_id'     => (int) $lesson_id,
            'type'          => $request->type,
            'resourse'      => $resourse,
            'duration'      => $request->duration,
            'status'        => 1,
            'created_by'    => auth()->user()->id,
            'updated_by'    => auth()->user()->id,
        ];
        $prev_sort_data = CourseMediaOverviews::where('lesson_id', $lesson_id)->orderby('sortindex', 'desc')->first();
        $data['sortindex'] = !empty($prev_sort_data) ? $prev_sort_data->sortindex + 1 : 0;
        if (CourseMediaOverviews::create($data)) {
            Session::flash('success', 'Resourse added Successfully.');
        } else {
            Session::flash('warning', 'Data is not added successfull, please try again.');
        }
        return redirect()->back();
    }
    public function resource_delete($course_id, $lesson_id, $id)
    {

        try {
            $resourse =  CourseMediaOverviews::where(["id" => $id])->first();
            if ($resourse->resourse && $resourse->type == "document") {
                if (file_exists($resourse->resourse)) {
                    unlink($resourse->resourse);
                }
            }
            CourseMediaOverviews::where(["id" => $id])->delete();
            Session::flash('success', 'Delete Successfully.');
        } catch (\Throwable $th) {
            Session::flash('warning', 'You can\'t delete this one');
        }
        return redirect()->back();
    }

    public function pricing($id)
    {
        $countries = Country::where('currency_symbol', "!=", '')->where('currency_name', "!=", '')->where('currency_code', "!=", '')->whereIn('currency_code', ["USD", "AUD", "BRL", "BDT", "CAD", "CLP", "COP", "EGP", "EUR", "GBP", "IDR", "ILS", "INR", "JPY", "KRW", "MXN", "MYR", "NOK", "PEN", "PHP", "PLN", "RON", "RUB", "SGD", "THB", "TRY", "TWD", "ZAR"])->groupBy('currency_name')->orderBy('currency_code')->get();
        $course = Courses::find($id);
        $pricetiers['currency_code'] = ($course->pricetiers) ? $course->pricetiers->currency_code : [];
        $coursepricetiers = CoursePricetiers::where($pricetiers)->orderBy('tier_index', 'asc')->get();
        return view('instructor.templates.courses.pricing', [
            'course' => $course,
            'countries' => $countries,
            'coursepricetiers' => $coursepricetiers,
        ]);
    }

    public function price_ajax(Request $request)
    {
        $coursepricetiers = CoursePricetiers::with(['currency'])->where('currency_code', $request->code)->orderBy('tier_index', 'asc')->get();
        return  response()->json($coursepricetiers);
    }

    public function price_store(Request $request, $id)
    {

        $request->validate([
            'currency'     => 'required',
            'pricetiers_id'     => 'required',
        ]);

        try {
            Courses::where('id', $id)->update(['pricetiers_id' => $request->pricetiers_id, 'old_pricetiers_id' => $request->pricetiers_id,]);
            Session::flash('success', 'Price Update Successfully.');
        } catch (\Throwable $th) {
            Session::flash('warning', "Price Update aren't successfull.");
        }
        return redirect()->back();
    }

    public function landing_media($id)
    {
        $course = Courses::find($id);
        return view('instructor.templates.courses.landing_media', [
            'course' => $course,
        ]);
    }
    public function landing_media_store(Request $request,$id)
    {
        if (isset($request->thumbnail)) {
            $request->validate([
                'thumbnail'         => "mimes:gif,jpg,jpeg,png|dimensions:width=750,height=422",
            ]);
            $pimage = $request->file('thumbnail');
            $fileExtention = $pimage->getClientOriginalExtension();
            $uploadPath = 'storage/course/resourses/';
            $imageName = auth()->user()->id . "_" . time() . '.' . $fileExtention;
            $data ['thumbnail'] = $uploadPath . $imageName;
            if ($pimage->move($uploadPath, $imageName)) {
                Courses::where('id',$id)->update($data);
                Session::flash('success', "Course image successfully.");
            }else{
                Session::flash('warning', "Course image not uploaded.");
            }
        }
        return redirect()->back();
    }

    public function promotion_add(Request $request,$course_id)
    {
        $lessondata = CoursePromotions::where(['course_id' => $course_id])->first();
        return view('instructor.templates.courses.promotion-modal-body', [
            "lessondata" => $lessondata,
            "section_id" => !empty($lessondata) ? $lessondata->section_id : null
        ]);
    }

    public function promotion($course_id)
    {
        $promotion = CoursePromotions::where(['course_id' => $course_id])->paginate(10);
        return view('instructor.templates.courses.promotion', [
            'promotions' => $promotion,
            'course' => Courses::find($course_id)
        ]);
    }
    public function promotion_create($course_id,$id=null)
    {
        $promotion = null;
        if($id){
            $promotion = CoursePromotions::find($id);
        }
        return view('instructor.templates.courses.promotion-modal-body', [
            'promotion' => $promotion,
            'course' => Courses::find($course_id)
        ]);
    }
}

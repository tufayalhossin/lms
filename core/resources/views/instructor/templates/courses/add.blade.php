@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursecontent',"active")
@section('content-add',"active")

<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Create Course",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Course",
        "menus" => [
            [
                'active' => false,
                'label' => 'course',
                'action' => route('instructor.course.list'),
            ],
            [
                'active' => true,
                'label' => 'content',
                'action' => '',
            ],
        ]
    ]
];
?>

@section('content')

<div class="col-sm-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("Landing Page")}}</h5>
            </div>
            <div class="card-body pt-3">
            <div class="col-md-8">
                <form action="{{route('instructor.course.store',[request()->operationID])}}"  method="post">
                    @csrf
                    <div class="mb-3 pt-5">
                        <h5>What is your course title? <span class="text-muted">*</span></h5>
                        <p>Take a better meaningful title with in 80 character what will students catch easily.</p>
                        <input type="text" class="form-control count-content" name="title"  required value="{{old('title')}}"  maxlength="80" placeholder="Insert your course title.">
                        <p class="text-end"><span id="counter">0</span>/80</p>
                    </div>
                    <div class="mb-3">
                        <h5>Course subtitle <span class="text-muted">*</span></h5>
                        <p>Take a better meaningful subtitle with in 120 character.</p>
                        <input type="text" class="form-control count-content" name="sort_description" value="{{old('sort_description')}}" required  maxlength="120" placeholder="Insert your course subtitle.">
                        <p class="text-end"><span id="counter">0</span>/120</p>
                    </div>
                    <div class="mb-3">
                        <h5>Course description</h5>
                        <textarea class="form-control" name="description" id="snow" required maxlength="200" rows="3">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <h5>Basic Informaion</h5>
                        <div class="row">
                            <div class="col-4">
                                <select name="category_id" id="" class="form-control" required >
                                    <option selected disabled>-- Select Category --</option>
                                    @forelse($categorylist as $value)
                                    <option value="{{$value->id}}">{{ucwords($value->name)}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="title"  required >
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5>Who is this course for?</h5>
                        <p>List the required skills, experience, tools or equipment learners should have prior to taking your course within 200 character. If there are no requirements, use this space as an opportunity to lower the barrier for beginners.</p>
                        <textarea class="form-control" name="intended_learners" required maxlength="200" rows="3">{{old('intended_learners')}}</textarea>
                    </div>
                   
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary  btn-sm">{{__("Submit")}}</button>
                        </div>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
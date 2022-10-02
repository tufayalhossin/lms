@extends('instructor.layouts.course')
@section('intendparent',"active")
@section('intend-add',"active")

<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Intended Learners create",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Intend",
        "menus" => [
            [
                'active' => false,
                'label' => 'course',
                'action' => route('instructor.course.intend'),
            ],
            [
                'active' => true,
                'label' => 'intend',
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
                <h5 class="m-0 text-dark card-title">{{__("Intended Learners")}} </h5>
            </div>
            <div class="card-body pt-3">
            <div class="col-md-8">
                <form action="{{route('instructor.course.intend_store')}}"  method="post">
                    @csrf
                    <p class="py-3">The following descriptions will be publicly visible on your <span class="text-primary">Course Landing Page</span> and will have a direct impact on your course performance. These descriptions will help learners decide if your course is right for them.</p>
                    <div class="mb-5">
                        <h5>What will students learn in your course? <span class="text-muted">*</span></h5>
                        <p>You must enter at least learning objectives or outcomes within 200 character that learners can expect to achieve after completing your course.</p>
                        <textarea class="form-control count-content" name="students_learn" required  maxlength="200" placeholder="Example: Define the roles and responsibilities of this subject, Case study and  identify and manage project risks." rows="3">{{old('students_learn')}}</textarea>
                        <p class="text-end"><span id="counter">0</span>/200</p>
                    </div>
                    <div class="mb-3">
                        <h5>What are the requirements or prerequisites for taking your course? <span class="text-muted">*</span></h5>
                        <p>Write a clear description of the intended learners for your course who will find your course content valuable within 200 character. This will help you attract the right learners to your course.</p>
                        <textarea class="form-control count-content" name="requirements" required maxlength="200" rows="3">{{old('requirements')}}</textarea>
                        <p class="text-end"><span id="counter">0</span>/200</p>
                    </div>
                    <div class="mb-3">
                        <h5>Who is this course for? <span class="text-muted">*</span></h5>
                        <p>List the required skills, experience, tools or equipment learners should have prior to taking your course within 200 character. If there are no requirements, use this space as an opportunity to lower the barrier for beginners.</p>
                        <textarea class="form-control count-content" name="intended_learners" required maxlength="200" rows="3">{{old('intended_learners')}}</textarea>
                        <p class="text-end"><span id="counter">0</span>/200</p>
                    </div>
                   
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary  btn-sm">{{__("Save & Next")}}</button>
                        </div>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
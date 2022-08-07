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
$subcategories = [];
?>

@section('content')

<div class="col-sm-8">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("Landing Page")}}</h5>
        </div>
        <div class="card-body pt-3">
            <form action="{{route('instructor.course.store',[request()->operationID])}}" id="coursecontent" method="post">
                @csrf
                <div class="mb-3 pt-3">
                    <h5>What is your course title? <span class="text-muted">*</span></h5>
                    <p>Take a better meaningful title with in 80 character what will students catch easily.</p>
                    <input type="text" class="form-control count-content" name="title" required value="{{$coursedata->title}}" maxlength="80" placeholder="Insert your course title.">
                    <p class="text-end"><span id="counter">0</span>/80</p>
                </div>
                <div class="mb-3">
                    <h5>Course subtitle <span class="text-muted">*</span></h5>
                    <p>Take a better meaningful subtitle with in 120 character.</p>
                    <input type="text" class="form-control count-content" name="sort_description" value="{{$coursedata->sort_description}}" required maxlength="120" placeholder="Insert your course subtitle.">
                    <p class="text-end"><span id="counter">0</span>/120</p>
                </div>
                <div class="mb-3">
                    <h5>Course description</h5>
                    <textarea name="description" class="form-control summernote">{!! $coursedata->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <h5>Discipline Informaion <span class="text-muted">*</span></h5>
                    <div class="row">
                        <div class="col-6">
                            <select name="categories_id" id="category_id" class="form-control null-choose-select" required>
                                <option selected disabled>-- Select Category --</option>
                                @forelse($categorylist as $value)
                                <?php
                                if ($coursedata->categories_id == $value->id) {
                                    $subcategories =  $value->subcategory;
                                }
                                ?>
                                <option value="{{$value->id}}" <?php if ($coursedata->categories_id == $value->id) {
                                                                    echo 'selected';
                                                                } ?>>{{ucwords($value->name)}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>

                        <div class="col-6">
                            <select name="subcategories_id" id="subcategory_id" class="form-control null-choose-select" required>
                                <option selected disabled>-- Select Subcategory --</option>
                               
                                @forelse($subcategories as $value)
                                <option value="{{$value->id}}" <?php if ($coursedata->subcategories_id == $value->id) {
                                                                    echo 'selected';
                                                                } ?>>{{$value->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h5>Basic Informaion <span class="text-muted">*</span></h5>
                    <div class="row">
                        <div class="col-4">
                            <select name="language_locale" class="form-control null-choose-select" required>
                                <option <?php if ($coursedata->language_locale == "arabic") {
                                            echo 'selected';
                                        } ?> value="arabic">Arabic</option>
                                <option <?php if ($coursedata->language_locale == "bangla") {
                                            echo 'selected';
                                        } ?> value="bangla">Bangla</option>
                                <option <?php if ($coursedata->language_locale == "standard-chinese") {
                                            echo 'selected';
                                        } ?> value="standard-chinese">Standard Chinese</option>
                                <option <?php if ($coursedata->language_locale == "english-us") {
                                            echo 'selected';
                                        } ?> value="english-us" selected>English (US)</option>
                                <option <?php if ($coursedata->language_locale == "english-uk") {
                                            echo 'selected';
                                        } ?> value="english-uk">English (UK)</option>
                                <option <?php if ($coursedata->language_locale == "hindi") {
                                            echo 'selected';
                                        } ?> value="hindi">Hindi</option>
                                <option <?php if ($coursedata->language_locale == "Urdu") {
                                            echo 'selected';
                                        } ?> value="Urdu">Urdu</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="instructional_level" id="instructional_level" class="form-control null-choose-select" required>
                                <option selected disabled>-- Select Level --</option>
                                <option <?php if ($coursedata->instructional_level == "beginner") {
                                            echo 'selected';
                                        } ?> value="beginner">Beginner Level</option>
                                <option <?php if ($coursedata->instructional_level == "intermediate") {
                                            echo 'selected';
                                        } ?> value="intermediate">Intermediate Level</option>
                                <option <?php if ($coursedata->instructional_level == "expert") {
                                            echo 'selected';
                                        } ?> value="expert">Expert Level</option>
                                <option <?php if ($coursedata->instructional_level == "all") {
                                            echo 'selected';
                                        } ?> value="all">All Levels</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="completion_certificate" class="form-control null-choose-select" required>
                                <option selected disabled>-- Select completion certificate --</option>
                                <option <?php if ($coursedata->completion_certificate == 1) {
                                            echo 'selected';
                                        } ?> value="1">Yes</option>
                                <option <?php if ($coursedata->completion_certificate == 0) {
                                            echo 'selected';
                                        } ?> value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h5>What is primarily taught in your course? <span class="text-muted">*</span></h5>
                    <input type="text" class="form-control count-content choices choices__input choices__input--cloned multiple-remove" name="tags" value="{{$coursedata->tags?implode(',',$coursedata->tags):''}}" required placeholder="Insert your course taught.">
                </div>

                <div class="col-sm-12 text-end">
                    <button type="submit" class="btn btn-primary  btn-sm">{{__("Submit")}}</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#category_id").change(function(e) {
        e.preventDefault();
        $("#subcategory_id").html('');
        $.ajax({
            type: "get",
            url: "{{route('instructor.subcategory.ajax')}}",
            data: {
                'id': $(this).val()
            },
            dataType: "json",
            success: function(response) {
                let options = ` <option selected disabled>-- Select Subcategory --</option>`;
                $.each(response, function(i, v) {
                    options += `<option value="${v.id}">${v.name}</option>`;
                });
                $("#subcategory_id").html(options);
            }
        });
    });

</script>
@endsection
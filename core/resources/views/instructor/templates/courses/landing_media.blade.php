@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursespublish',"active")
@section('landing-media-add',"active")
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
                'action' => route('instructor.course.landing_media', [request()->operationID]),
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
<style>
    .image-upload-preview-with-crop--image-wrapper--2soBW {
        background: #f7f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
        border: 1px solid #ebebeb;
    }

    .udlite-sr-only {
        position: absolute !important;
        height: 1px;
        width: 1px;
    }

    .file-uploader--uploader-label--3kJ-K {
        cursor: pointer;
        margin: 0;
    }

    .file-uploader--input-group--8ZGMh {
        display: flex;
        height: 100%;
    }

    .file-uploader--progress-bar-wrapper--1hcOD,
    .file-uploader--input-group--8ZGMh .file-uploader--fake-input--35XUn {
        border: 1px solid #1c1d1f;
        border-right: 0;
        flex: 1;
        min-width: 1px;
        height: 100%;
    }

    .file-uploader--fake-input--35XUn {
        background-color: #f7f9fa;
        color: #1c1d1f;
        display: flex;
        align-items: center;
        padding: 0 1.6rem;
    }

    .file-uploader--input-group--8ZGMh>.file-uploader--btn--39dte {
        height: 100%;
        border: 1px solid #1c1d1f;
    }

    .udlite-btn-secondary,
    .udlite-btn-secondary.udlite-btn-disabled {
        color: #1c1d1f;
        background-color: transparent;
        border: 1px solid #1c1d1f;
    }

    .udlite-btn {
        position: relative;
        align-items: center;
        border: none;
        cursor: pointer;
        display: inline-flex;
        min-width: 8rem;
        padding: 0 1.2rem;
        justify-content: center;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: bottom;
        white-space: nowrap;
    }

    .file-uploader--fake-input-text--2t3aS {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .file-uploader--file-uploader-large--1EDEu {
        height: 2.8rem;
    }
</style>
<div class="col-sm-10">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("image")}}</h5>
        </div>
        <div class="card-body pt-3">
            <form action="{{route('instructor.course.landing_media_store',[request()->operationID])}}" id="coursecontent" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <div class="image-upload-preview-with-crop--image-wrapper--2soBW">
                            @if($course->thumbnail && file_exists($course->thumbnail))
                            <img class="w-100" src="{{url($course->thumbnail)}}" alt="{{$course->title}}">
                            @else
                            <img class="w-100" src="{{url('webroot/app/images/course_placeholder_thumbnail.jpg')}}" alt="{{$course->title}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="pt-3">
                            <p>Upload your course image here. It must meet course standards image quality to be accepted. Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif, or .png. no text on the image.</p>
                            <input type="file" class="udlite-sr-only" accept=".gif,.jpg,.jpeg,.png" name="thumbnail" id="thumb-input">
                            <label for="thumb-input" class="file-uploader--input-group--8ZGMh file-uploader--file-uploader-large--1EDEu file-uploader--uploader-label--3kJ-K">
                                <span class="file-uploader--fake-input--35XUn">
                                    <span class="file-uploader--fake-input-text--2t3aS">No file selected</span>
                                </span>
                                <span class="udlite-btn udlite-btn-large udlite-heading-md file-uploader--btn--39dte "><span>
                                @if($course->thumbnail && file_exists($course->thumbnail))
                                Change Image
                                @else
                                Upload Image
                                @endif
                                    </span>
                                </span>
                            </label>
                            <div class="text-end mt-3 submit d-none">
                                <button type="submit" class="btn btn-primary">{{__("Save")}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change',"#thumb-input",function(e) {
        e.preventDefault();
        let thumb = $(this).val();
        if (thumb ) {
            let filename = thumb.split("\\")[2];
            $('.submit').removeClass('d-none');
            $('.file-uploader--fake-input-text--2t3aS').html(filename);
        }
    });

</script>
@endsection
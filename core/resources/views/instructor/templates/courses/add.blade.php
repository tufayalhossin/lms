@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursesparent',"active")
@section('courses-add',"active")

<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Category",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Category",
        "menus" => [
            [
                'active' => false,
                'label' => 'category',
                'action' => route('admin.category.list'),
            ],
            [
                'active' => true,
                'label' => 'add',
                'action' => '',
            ],
        ]
    ]
];
?>

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 text-dark card-title">{{__("New")}} {{__("Course")}}</h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('instructor.course.create')}}">{{ __("Course View") }}</a>
            </div>
            <div class="card-body">


                <form action="{{route('instructor.course.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Name')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('name')}}" class="form-control" name="name" id="inputEmail3" placeholder="{{__('Category')}} {{__('Name')}} " required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">{{__('Photo')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="file" name="photo" id="example-fileinput" class="form-control" accept="image/*" required>
                            <small><i class="dripicons-information"></i> The photo must jpg, jpeg, png or gif and not be greater than 500 kilobytes.</small>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Description')}}</label>
                        <div class="col-sm-8">
                            <textarea name="description" class="form-control" rows="2">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <!-- Success Switch-->
                    <div class="form-group row mb-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">{{__('Active')}} {{__('Status')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="status" id="switch3" checked data-switch="success" />
                            <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-10 text-end">
                            <button type="submit" class="btn btn-primary  btn-sm">{{__("Add")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
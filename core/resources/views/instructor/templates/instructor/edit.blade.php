@extends('backend.layouts.app')
@section('page-title',"Subcategory Add")
@section('categoryparent',"show menuitem-active")
@section('subcategory-active',"menuitem-active")

<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Subcategory",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Subcategory",
        "menus" => [
            [
                'active' => false,
                'label' => 'subcategory',
                'action' => route('admin.subcategory.list'),
            ],
            [
                'active' => true,
                'label' => 'edit',
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
                <h5 class="m-0 text-dark card-title">{{__("Edit")}} {{__("Subcategory")}}</h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('admin.subcategory.list')}}">{{ __("View List") }}</a>
            </div>
            <div class="card-body">
                <form action="{{route('admin.subcategory.update',[$subcategory->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Current Photo')}}</label>
                        <div class="col-sm-8">
                            <?php if (hasFile($subcategory->photo)) { ?>
                                <img class="rounded shadow w-100px img-thumbnail" src="{{url($subcategory->photo)}}" alt="{{$subcategory->name}}">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Name')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$subcategory->name}}" class="form-control" name="name" id="inputEmail3" placeholder="{{__('Category')}} {{__('Name')}} " required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">{{__('Photo')}}</label>
                        <div class="col-sm-8">
                            <input type="file" name="photo" id="example-fileinput" class="form-control" accept="image/*">
                            <small><i class="dripicons-information"></i> The photo must jpg, jpeg, png or gif and not be greater than 500 kilobytes.</small>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Category')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="category_id"  class="form-control select2" data-toggle="select2" required>
                                @forelse($categorylist as $value)
                                    <option value="{{$value->id}}"  <?php if($subcategory->category_id == $value->id){echo 'selected';}?> >{{ucwords($value->name)}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Description')}}</label>
                        <div class="col-sm-8">
                            <textarea name="description" class="form-control" rows="2">{{$subcategory->description}}</textarea>
                        </div>
                    </div>
                    <!-- Success Switch-->
                    <div class="form-group row mb-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">{{__('Active')}} {{__('Status')}}<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="checkbox" value="" name="status" id="switch3" {{($subcategory->status)?'checked':''}} data-switch="success" />
                            <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-10 text-end">
                            <button type="submit" class="btn btn-primary  btn-sm">{{__("Update")}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
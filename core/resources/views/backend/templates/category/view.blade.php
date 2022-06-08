@extends('backend.layouts.app')
@section('page-title',"Category Details")
@section('categoryparent',"show menuitem-active")
@section('category-active',"menuitem-active")

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
                'label' => __("details"),
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
                <h5 class="m-0 text-dark card-title">{{__("Category")}} {{__("Details")}} </h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('admin.category.list')}}">{{ __("View List") }}</a>
            </div>

            <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ucwords($category->name)}}</h5>
                                <p class="card-text">
                                    <?php if($category->status){ ?>
                                    <span class="badge badge-outline-success rounded-pill">Active</span>
                                    <?php }else{ ?>
                                        <span class="badge badge-outline-danger rounded-pill">Inactive</span>
                                    <?php }?> 
                                    <?php if($category->created_at != null){ ?>
                                    <span class="badge bg-light text-dark rounded-pill ml-2">Created {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</span>
                                    <?php } if($category->updated_at != null){ ?>
                                        <span class="badge bg-light text-dark rounded-pill  ml-2">Last updated {{Carbon\Carbon::parse($category->updated_at)->diffForHumans()}} </span>
                                    <?php }?> 
                                </p>
                                <p class="card-text">{{ucwords($category->description)}}</p>
                                
                            </div> <!-- end card-body -->
                        </div> <!-- end col -->
                        <div class="col-md-4">
                        <?php if (haveFile($category->photo)) { ?>
                                <img class="rounded shadow w-100px img-thumbnail" src="{{url($category->photo)}}" alt="{{$category->name}}">
                            <?php } ?>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@include('backend.elements.datatable-script')
@endsection
@extends('backend.layouts.app')
@section('page-title',"Category List")
@section('categoryparent',"show menuitem-active")
@section('category-active',"menuitem-active")

@section('style')
<!-- Datatables css -->
@include('backend.elements.datatable-style')
@endsection
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
                'label' => 'all',
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
                <h5 class="m-0 text-dark card-title">{{__("All")}} {{__("Categories")}}</h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('admin.category.create')}}">{{ __("Add New") }}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap w-100" id="basic-datatable">
                        <thead class="thead-light">
                            <tr>
                                <th width="100">{{__("Thumbnail")}}</th>
                                <th>{{__("Name")}}</th>
                                <th>{{__("Status")}}</th>
                                <th width="50">{{__("Action")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@include('backend.elements.datatable-script')
@endsection
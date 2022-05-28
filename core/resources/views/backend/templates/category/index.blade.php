@extends('backend.layouts.app')
@section('page-title',"Category List")
@section('discipline',"show")
@section('disciplineparent',"active")

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
                <h5 class="m-0 text-dark card-title">{{__("Category List")}}</h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('admin.category.create')}}">{{ __("Add New") }}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  dt-responsive  table-sm artyirdatatable display nowrap" id="branddata">
                        <thead class="thead-light">
                            <tr>
                                <th width="50">SL</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorylist as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ucwords($value->name)}}</td>
                                <td>{{($value->status)?"Active":"Inactive"}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <i class="uil uil-ellipsis-v btn dropdown-toggle artyir-dropdown-toggle btn-light" id="dropdownMenuLink" data-bs-toggle="dropdown" ></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="{{route('admin.category.edit',[$value->id])}}" class="dropdown-item"> Edit</a>
                                            <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('admin.category.delete',[$value->id])}}" class="dropdown-item text-danger"><i class="icon-cross3" style="color: red;"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
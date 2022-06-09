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
                            @forelse($categorylist as $key => $value)
                            <tr>
                                <td>
                                    <?php 
                                        if(hasFile($value->photo)){
                                    ?> 
                                    <img class=" rounded avatar-thumb-img-40" src="{{url($value->photo)}}" alt="{{$value->name}}">   
                                    <?php }else{?>
                                        <div class="avatar-container s40 shadow-sm border border-primary">
                                            {{substr($value->name, 0, 1)}}
                                        </div>
                                    <?php }?>

                                </td>
                                <td>{{ucwords($value->name)}}</td>
                                <td><?php if($value->status){ ?>
                                    <span class="badge badge-outline-success rounded-pill">Active</span>
                                    <?php }else{ ?>
                                        <span class="badge badge-outline-danger rounded-pill">Inactive</span>
                                    <?php }?></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <i class="uil uil-ellipsis-v dropdown-toggle artyir-dropdown-toggle btn btn-light btn-sm" id="dropdownMenuLink" data-bs-toggle="dropdown" ></i>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a href="{{route('admin.category.view',[$value->id])}}" class="dropdown-item  text-info"><i class="dripicons-information me-2"></i> View</a></li>
                                        <li><a href="{{route('admin.category.edit',[$value->id])}}" class="dropdown-item text-warning"><i class="dripicons-document-edit me-2"></i> Edit</a></li>
                                            <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('admin.category.delete',[$value->id])}}" class="dropdown-item text-danger"><i class="dripicons-trash me-2 "></i> Delete</a>
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

@section('script')
@include('backend.elements.datatable-script')
@endsection
@extends('backend.layouts.app')
@section('page-title',"Category List")
@section('discipline',"show")
@section('disciplineparent',"active")

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
                <h5 class="m-0 text-dark card-title">{{__("Category List")}}</h5>
                <a class="m-0 btn-primary btn btn-sm float-right" href="{{route('admin.category.create')}}">{{ __("Add New") }}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="basic-datatable">
                        <thead class="thead-light">
                            <tr>
                                <th width="100">Thumbnail</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th width="50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorylist as $key => $value)
                            <tr>
                                <td>
                                    <?php 
                                        if(!empty($value->name)&& file_exists(asset($value->photo))){
                                    ?> 
                                    <img class=" rounded avatar-thumb-img-40" src="{{asset($value->photo)}}" alt="{{$value->name}}">   
                                    <?php }else{?>
                                        <img class="rounded avatar-thumb-img-40" src="{{asset('storage/category/html.png')}}" alt="{{$value->name}}">   

                                        <!-- <div class="avatar-container s40 shadow-sm border border-primary">
                                            {{substr($value->name, 0, 1)}}
                                        </div> -->
                                    <?php }?>

                                </td>
                                <td>{{ucwords($value->name)}}</td>
                                <td>{{($value->status)?"Active":"Inactive"}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <i class="uil uil-ellipsis-v dropdown-toggle artyir-dropdown-toggle btn btn-primary btn-sm" id="dropdownMenuLink" data-bs-toggle="dropdown" ></i>
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

@section('script')
@include('backend.elements.datatable-script')
@endsection
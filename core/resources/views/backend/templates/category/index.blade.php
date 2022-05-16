@extends('backend.layouts.app')
@section('page-title',"Category List")
@section('discipline',"show")
@section('disciplineparent',"active")

@section('content')
@php 
$breadcrumb= [
    "title"=>"Category",
    "menus"=>[
        [
        "label"=> "Category",
        "action"=> route('admin.category.list'),
        "active"=> true,
        ],
        [
        "label"=> "All",
        "action"=> '',
        "active"=> false,
        ],
    ]];
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 text-dark card-title">{{__("Category List")}}</h5>
                <a class="m-0 btn-artyir btn btn-sm float-right"
                    href="{{route('admin.category.create')}}">{{ __("Add New") }}</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  dt-responsive  table-sm artyirdatatable display nowrap" id="branddata">
                        <thead class="thead-light">
                            <tr>
                                <th width="50">SL</th>
                                <th>Name</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorylist as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ucwords($value->name)}}</td>
                                
                                </td>


                                <td class="text-right">

                                    <a href="{{route('admin.category.edit',[$value->id])}}"
                                        class="btn text-info btn-sm mb-2"><i class="icon-pencil"
                                            style="color: blue;"></i> Edit</a>

                                        
                                    <a class="dropdown-item notify-item" href="{{route('admin.category.delete',[$value->id])}}" onclick=" confirm('Are you sure you want to delete this item?');
                                                     document.getElementById('delete-form').submit(); false"> <i class="fa fa-lock"></i>
                           <i class="mdi mdi-logout me-1"></i> <span>{{ __('Logout') }}</span>
                       </a>
                       <form id="delete-form" action="{{route('admin.category.delete',[$value->id])}}" method="POST" class="d-none">
                           @csrf
                       </form>
                                    <a onclick="return confirm('Are you sure you want to delete this item?');"
                                        href="{{route('admin.category.delete',[$value->id])}}"
                                        class="btn text-danger btn-sm  mb-2"><i class="icon-cross3"
                                            style="color: red;"></i> Delete</a>
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
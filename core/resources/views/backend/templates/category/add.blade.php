@extends('backend.layouts.app')
@section('page-title',"Add Category")
@section('category',"show")
@section('categoryparent',"active")
@section('breadcrumb')
<div class="page-title-box">
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('app.category.all')}}">category</a></li>
            <li class="breadcrumb-item active">new</li>
        </ol>
    </div>
    <h4 class="page-title">{{__("Category")}}</h4>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 text-dark card-title">{{__("Add New Category")}}</h5>
                <a class="m-0 btn-artyir btn btn-sm float-right" href="{{route('app.category.all')}}">{{ __("View All") }}</a>
            </div>
            <div class="card-body">
                <form action="{{route('user.discipline.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Name<small
                                class="text-danger">*</small></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="inputEmail3"
                                placeholder="Category Name" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10 text-right">
                            <button type="submit" class="btn btn-artyir  btn-sm">{{__("Create")}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

@endsection
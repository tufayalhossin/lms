@extends($guardlayout)
@section('page-title',"Edit Category")
@section('discipline',"show")
@section('disciplineparent',"active")

@section('breadcrumb')
<div class="page-title-box">
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.discipline.all')}}">category</a></li>
            <li class="breadcrumb-item active">edit</li>
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
            <h5 class="m-0 text-dark card-title">{{__("Edit Category")}}</h5>
            <a class="m-0 btn-artyir btn btn-sm float-right" href="{{route('user.discipline.all')}}">{{ __("View All") }}</a>

        </div>
        <div class="card-body">
        

            <form action="{{route('user.discipline.update',[$discipline->id])}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">{{__('Name')}}<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$discipline->name}}" class="form-control" name="name" id="inputEmail3" placeholder="Category Name"
                            required>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-10 text-right">
                        <button type="submit" class="btn btn-artyir  btn-sm">{{__("Update")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
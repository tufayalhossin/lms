@extends('instructor.layouts.app')
@section('coursesparent',"active")
@section('courses-draft',"active")

@section('style')
<!-- Datatables css -->
@include('instructor.elements.datatable-style')
<link rel="stylesheet" href="{{url('webroot/assets/fontawesome/css/all.min.css')}}">
@endsection
<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Course",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Courses",
        "menus" => [
            [
                'active' => false,
                'label' => 'Draft courses',
                'action' => route('instructor.course.draft'),
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
<div class="col-12">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <span class="m-0 card-title">{{__("Draft")}} {{__("Courses")}}</span>
            </div>
            <div class="card-body  mt-3">
                <table class="table  table-sm dt-responsive data-table" id="table1">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Certificate</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>Classes</th>
                            <th width="50">{{__("Action")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courselist as $key => $value)
                        <tr>
                        <td>
                                <?php
                                if (hasFile($value->thumbnail)) {
                                ?>
                                    <img class=" rounded avatar-thumb-img img-thumbnail" src="{{url($value->thumbnail)}}" alt="{{$value->title}}">
                                    <?php } else { ?>
                                        <img class=" rounded avatar-thumb-img" src="{{url('webroot/assets/images//samples/origami.jpg')}}" alt="{{$value->title}}">
                                <?php } ?>

                            </td>
                            <td>
                                <h5>{{$value->title}}</h5>
                                @if($value->sort_description)
                                <p class="text-muted">{{$value->sort_description}}</p>
                                @endif
                               @if($value->instructional_level)
                               <span class="badge rounded-pill bg-light text-dark ">{{ucfirst($value->instructional_level)}}</span> &nbsp;
                               @endif
                               @if($value->language_locale)
                               <span class="badge rounded-pill bg-light text-dark ">{{ucfirst($value->language_locale)}}</span></br>
                               @endif
                                <span class="badge rounded-pill bg-success">Active</span>
                            </td>
                            <td>
                                <?php if($value->completion_certificate){?>
                                Yes
                                <?php }else{?>
                                No
                                <?php }?>
                                <br/>
                                <span class="badge rounded-pill bg-light text-dark ">{{$value->completion_certificate_price}}</span>
                           
                            </td>
                            <td>
                                {{($value->category)?$value->category->name:''}} <br>
                                <?php if(!empty($value->subcategory)){?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" class="text-info" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
</svg> {{$value->subcategory->name}}
                                <?php }?>
                            </td>
                            <td>0</td>
                            <td>
                              <p>{{sizeof($value->sections)}}</p>
                            </td>
                           
                            <td class="text-right">
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-v dropdown-toggle artyir-dropdown-toggle btn btn-primary" id="dropdownMenuLink" data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a href="{{route('admin.subcategory.view',[$value->id])}}" class="dropdown-item  text-info"><i class="dripicons-information me-2"></i> View</a></li>
                                        <li><a href="{{route('instructor.course.intend',[$value->id])}}" class="dropdown-item text-warning"><i class="dripicons-document-edit me-2"></i> Edit</a></li>
                                        <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('admin.subcategory.delete',[$value->id])}}" class="dropdown-item text-danger"><i class="dripicons-trash me-2 "></i> Delete</a>
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



@endsection

@section('script')
@include('instructor.elements.datatable-script')
@endsection
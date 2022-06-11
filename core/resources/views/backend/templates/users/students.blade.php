@extends('backend.layouts.app')
@section('page-title',"Student List")
@section('studentparent',"show menuitem-active")
@section('student-'.$status,"menuitem-active")

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
        "title" => $status." Student",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => $status ." Student",
        "menus" => [
            [
                'active' => false,
                'label' => $status.' student',
                'action' => route('admin.students.list'),
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
                <h5 class="m-0 text-dark card-title">{{__($status)}} {{__("Students")}}</h5>
            </div>

            <div class="card-body">
                <table class="table table-sm dt-responsive nowrap w-100" id="basic-datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{__("Name")}}</th>
                            <th>{{__("Email")}}</th>
                            <th>{{__("Status")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($studentslist as $key => $value)
                        <tr>
                            <td>{{ucwords($value->name)}}</td>
                            <td>{{ucwords($value->email)}}</td>
                            <td><?php if ($value->status == "Active") { ?>
                                    <span class="badge badge-outline-success rounded-pill">{{ucwords($value->status)}}</span>
                                <?php } else { ?>
                                    <span class="badge badge-outline-danger rounded-pill">{{ucwords($value->status)}}</span>
                                <?php } ?>
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
@endsection

@section('script')
@include('backend.elements.datatable-script')
@endsection
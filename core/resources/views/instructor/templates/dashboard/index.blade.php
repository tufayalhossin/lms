@extends('instructor.layouts.app')
@section('dashboard',"active")
<?php
$infoDonor = [
    "meta" => [
        "title" => "Dashboard",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Dashboard",
        "menus" => [
            [
                'active' => true,
                'label' => 'dashboard',
                'action' => route('instructor.dashboard'),
            ],
        ]
    ]
];
?>

@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">This Month Revenue</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Last Month Revenue</h6>
                            <h6 class="font-extrabold mb-0">183.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Revenue</h6>
                            <h6 class="font-extrabold mb-0">80.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Saved Post</h6>
                            <h6 class="font-extrabold mb-0">112</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Status <i class="icon dripicons dripicons-media-record"></i></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body crm-tab-widget">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-5">
                            <div class="nav flex-column nav-pills" id="v-pills-ticket-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link text-muted" id="v-pills-sales-tab" data-toggle="pill" href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="false">
                                    <i class="bi bi-circle form-control-sm "></i>
                                    Courses
                                    <span class="float-end font-14 ">10</span>
                                </a>
                                <a class="nav-link text-muted" id="v-pills-product-tab" data-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">
                                    <i class="bi bi-circle form-control-sm"></i>
                                    Students
                                    <span class="float-end font-14 ">1</span>
                                </a>
                                <a class="nav-link text-muted" id="v-pills-hiring-tab" data-toggle="pill" href="#v-pills-hiring" role="tab" aria-controls="v-pills-hiring" aria-selected="false">
                                    <i class="bi bi-circle form-control-sm"></i>
                                    Enrollments
                                    <span class="float-end font-14">7</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 p-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4>Latest Comments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{url('webroot/assets/images/faces/5.jpg')}}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Congratulations on your graduation!</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{url('webroot/assets/images/faces/2.jpg')}}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                            this design?</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="{{url('webroot/assets/js/pages/dashboard.js')}}"></script>
@endsection
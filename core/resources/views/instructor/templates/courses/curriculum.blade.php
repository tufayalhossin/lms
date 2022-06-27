@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursecontent',"active")
@section('curriculum-add',"active")


<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Course Curriculum",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Curriculums",
        "menus" => [
            [
                'active' => false,
                'label' => 'course',
                'action' => route('instructor.course.list'),
            ],
            [
                'active' => true,
                'label' => 'curriculum',
                'action' => '',
            ],
        ]
    ]
];
$subcategors = null;
?>

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("Curriculum")}}</h5>
        </div>
        <div class="card-body pt-3">
            <div class="card bg-light text-seconday on-hover-action mb-5" id="section-6">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="font-weight-light">  Section 1</span> : Introduction

                        <span class="p-3">
                            <a href="#!" onclick="forModal('https://demo.courselms.com/dashboard/class/edit/29', 'Add Class')">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a onclick="confirm_modal('https://demo.courselms.com/dashboard/class/trash/29')" href="#!">
                                <i class="feather icon-trash"></i>
                            </a>
                        </span>


                    </h5>
                    <div class="clearfix"></div>
                    <div class="col-md-12 table-responsive">

                        <table id="table" class="table table-bordered table-striped">
                            <tbody class="tablecontents ui-sortable">
                                <tr class="bg-white grab mb-2" data-id="59" style="opacity: 1;">
                                    <td class="w-100">
                                        <i class="fa fa-arrows grab-icon"></i>
                                        <strong>Foodcad</strong>

                                        <a href="#!" onclick="forModal('https://demo.courselms.com/dashboard/class/content/show/59', 'Foodcad')">
                                            <span class="nest-span-eye">
                                                <i class="feather icon-eye"></i>
                                            </span>
                                        </a>
                                        <a onclick="confirm_modal('https://demo.courselms.com/dashboard/class/content/trash/59')" href="#!">
                                            <span class="nest-span-trash">
                                                <i class="feather icon-trash"></i>
                                            </span>
                                        </a>

                                        <div class="d-flex pl-5">
                                            <div class="switchery-list mx-2">
                                                <input type="checkbox" data-url="https://demo.courselms.com/dashboard/content/published" data-id="59" class="js-switch-primary" id="category-switch" checked="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(80, 111, 228); border-color: rgb(80, 111, 228); box-shadow: rgb(80, 111, 228) 0px 0px 0px 11.5px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 27px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                                                <span>Published</span>
                                            </div>

                                            <div class="switchery-list mx-2">
                                                <input type="checkbox" data-url="https://demo.courselms.com/dashboard/content/preview" data-id="59" class="js-switch-warning" id="category-switch" checked="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(247, 187, 77); border-color: rgb(247, 187, 77); box-shadow: rgb(247, 187, 77) 0px 0px 0px 11.5px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 27px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                                                <span>Preview</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>


</script>
@endsection
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
            <!-- Button trigger for login form modal -->
            <div class="text-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#sectionoperation">
                    Add Section
                </button>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @forelse($coursedata->sections as $key => $section)

                <div class="accordion-item">
                    <h2 class="accordion-header" id="curriculum-heading{{$key}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#curriculum-{{$key}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{$section->title}}
                        </button>
                    </h2>
                    <div id="curriculum-{{$key}}" class="accordion-collapse collapse" aria-labelledby="curriculum-heading{{$key}}" data-bs-parent="#accordionFlushExample">
                        <div class="card bg-light text-seconday on-hover-action mb-5" id="section-6">
                            <div class="card-body">
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
                                                    <p>{{}}</p>
                                                    <div class="d-flex pl-5 pt-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="published-{{$key}}" checked>
                                                            <label class="form-check-label" for="published-{{$key}}">Published</label>
                                                        </div>
                                                        <div class="form-check form-switch mx-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="preview-{{$key}}" checked>
                                                            <label class="form-check-label" for="preview-{{$key}}">Preview</label>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






                @empty
                @endforelse

            </div>
        </div>
    </div>
</div>

<!--login form Modal -->
<div class="modal fade text-left bg-dark" id="sectionoperation" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Add Section</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form action="{{route('instructor.course.section_store',[request()->operationID])}}" method="post">
                @csrf
                <div class="modal-body">
                    <label>Name: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Section name" name="title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')
<script>


</script>
@endsection
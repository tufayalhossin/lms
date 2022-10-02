@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursecontent',"active")
@section('curriculum-add',"active")

@section('style')
<link rel="stylesheet" href="{{url('webroot/vendors/timepicker/timepicker.css')}}">
<style>
    .edit-curriculumn {
        position: absolute;
        display: none;
        /* background-color: #ebebeb; */
        transition: all .3s;
        right: 15px;
        z-index: 999;
    }

    .accordion-header:hover .edit-curriculumn {
        display: block;
    }

    .accordion-item {
        cursor: pointer;
    }
    .iframe-body iframe{
        width: 100% !important;
        height: 100px;
    }
</style>
@endsection

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
            <div class="row mb-3">
                <div class="col-6">
                    <p> <i class="bi bi-info-circle icon-inline"></i> Your first lecture is outside of a paid section.</p>
                </div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-outline-primary btn-rounded btn-sm ml-1 mr-1" data-bs-toggle="modal" data-bs-target="#sectionoperation"><i class="bi bi-intersect"></i> Section</button>
                </div>
            </div>
            <div class="accordion accordion-flush panel_position" id="accordionFlushExample">
                @forelse($coursedata->sections as $key => $section)

                <div class="accordion-item section-body mb-2 " id="{{$section->id}}">
                    <h2 class="accordion-header position-relative accordion-button collapsed " id="curriculum-heading{{$key}}" data-bs-toggle="collapse" data-bs-target="#curriculum-{{$key}}" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{$section->title}}
                        <div class="justify-content-center edit-curriculumn">
                            <button type="button" class="btn btn-outline-primary btn-rounded btn-sm ml-1 mr-1 lessonoperation" data-id="" data-section="{{$section->id}}" data-bs-toggle="modal" data-bs-target="#lessonoperation">Create Lesson</button>
                            <button type="button" class="btn btn-outline-primary btn-rounded btn-sm ml-1 mr-1 curriculum-heading-edit" data-id="{{$section->id}}" data-name="{{$section->title}}" data-bs-toggle="modal" data-bs-target="#sectionoperation">Edit Section</button>
                            <button type="button" class="btn btn-outline-primary btn-rounded btn-sm ml-1 mr-1 deletemodal" data-url="{{route('instructor.course.section_destroy',[request()->operationID,$section->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete Section</button>
                        </div>
                    </h2>
                    <div id="curriculum-{{$key}}" class="accordion-collapse collapse" aria-labelledby="curriculum-heading{{$key}}" data-bs-parent="#accordionFlushExample">

                        <div class="card bg-light text-seconday on-hover-action mb-5">
                            <div class="card-body">
                                <div class="col-md-12 ">
                                    <div class="accordion accordion-flush lesson-position"  id="accordionlession">
                                        @forelse($section->lessons as $k => $lesson)
                                        <div class="accordion-item lesson-id"  id="{{$lesson->id}}">
                                            <h2 class="accordion-header position-relative" id="lesseon-heading{{$k}}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lesseon-collapse{{$k}}" aria-expanded="false" aria-controls="lesseon-collapse{{$k}}">
                                                    {{ $lesson->title}}
                                                </button>
                                            </h2>
                                            <div id="lesseon-collapse{{$k}}" class="accordion-collapse collapse">
                                                <div class="accordion-body border">

                                                    <div class="row pl-5 pt-2">
                                                        <div class="col-sm-6">
                                                        <p><small><span class="text-info">Note:</span> Only first video will visiable for student.</small></p>
                                                        </div>
                                                        <div class="col-sm-6  text-end">
                                                            <button type="button" class="btn btn-outline-primary btn-rounded btn-sm ml-1 mr-1 lesson_resource" data-id="{{$lesson->id}}" data-bs-toggle="modal" data-bs-target="#lessonmediamodal"><i class="bi bi-file-earmark-play"></i> Resourse</button>
                                                        </div>

                                                    </div>

                                                    <div class="mt-3">
                                                       <div class="d-flex">
                                                        @forelse($lesson->media as $i => $media)
                                                        @if($media->type == "youtube")
                                                        <div style="width:150px" class="shadow p-2 rounded mx-1">
                                                        <iframe width="100%" height="100" src="https://www.youtube.com/embed/{{$media->resourse}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        <button class="btn btn-sm w-100 btn-warning  deletemodal" data-url="{{route('instructor.course.resource_delete',[request()->operationID,$media->lesson_id,$media->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
                                                        </div>
                                                        @endif
                                                        @if($media->type == "vimeo")
                                                        <div style="width:150px" class="shadow p-2 rounded mx-1">
                                                        <iframe width="100%" height="100" src="https://player.vimeo.com/video/{{$media->resourse}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        <button class="btn btn-sm w-100 btn-warning  deletemodal" data-url="{{route('instructor.course.resource_delete',[request()->operationID,$media->lesson_id,$media->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
                                                        </div>
                                                        @endif
                                                        @if($media->type == "link")
                                                        <div style="width:150px" class="shadow p-2 rounded mx-1">
                                                        <video src="{{$media->resourse}}"  width="100%" height="100" controls>
                                                        <source src="mov_bbb.mp4">
                                                        </video>
                                                        <button class="btn btn-sm w-100 btn-warning  deletemodal" data-url="{{route('instructor.course.resource_delete',[request()->operationID,$media->lesson_id,$media->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
                                                        </div>
                                                        @endif
                                                        @if($media->type == "iframe")
                                                        <div style="width:150px" class="shadow p-2 iframe-body rounded mx-1">
                                                        {!!$media->resourse!!}
                                                        <button class="btn btn-sm w-100 btn-warning  deletemodal" data-url="{{route('instructor.course.resource_delete',[request()->operationID,$media->lesson_id,$media->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
                                                        </div>
                                                        @endif
                                                        @if($media->type == "document" &&   file_exists($media->resourse))

                                                        <div style="width:150px" class="shadow p-2 rounded mx-1 text-center">
                                                            <a href="{{url($media->resourse)}}"> <i class="bi bi-file-earmark" style="font-size:58px"></i></a>
                                                        <button class="btn btn-sm w-100 btn-warning  deletemodal" data-url="{{route('instructor.course.resource_delete',[request()->operationID,$media->lesson_id,$media->id])}}" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete</button>
                                                        </div>
                                                        @endif
                                                        @empty
                                                        @endforelse
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <h5>Lecture description</h5>
                                                        {!!$lesson->lecture_description!!}
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
                    </div>
                </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
</div>
</div>

<!--section add Modal -->
<div class="modal fade text-left bg-light" id="sectionoperation" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="section-crud">Add Section</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form action="{{route('instructor.course.section_store',[request()->operationID])}}" method="post">
                @csrf
                <input type="hidden" id="modal-section-id" name="id">
                <div class="modal-body">
                    <label>Name: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Section name" name="title" id="modal-section-name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <span>Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Lesson add Modal -->
<div class="modal fade text-left bg-light" id="lessonoperation" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="lessonoperation" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lesson-modal-title">Create Lesson</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('instructor.course.lesson_store',[request()->operationID])}}" method="post">
                    @csrf
                    <input type="hidden" id="modal_lession_id" name="lession_id">
                    <div id="lesson-modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                            <span>Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <span>Save</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Lesson media add Modal -->
<div class="modal fade text-left bg-light" id="lessonmediamodal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="lessonoperation" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lesson-modal-title">Add Resource</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="resource_modal" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="resource_modal_lession_id" name="lession_id">


                    <div>
                        <div class="form-group">
                            <label>Type: <pub class="text-danger">*</pub></label>
                            <select name="type" id="lesson-type" class="form-control" required>
                                <option value="" selected disabled>Select Type </option>
                                <option value="youtube">Youtube</option>
                                <option value="vimeo">Vimeo</option>
                                <option value="link">Link</option>
                                <option value="document">Document</option>
                                <option value="iframe">Iframe</option>
                            </select>
                        </div>
                        <div id="resource_input">
                           
                        </div>

                        <div class="form-group">
                            <label>Duration: <pub class="text-danger">*</pub></label>
                            <input type="text" name="duration" id="duration" placeholder="00:00:00" required class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                            <span>Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <span>Save</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!--delete Modal -->
<div class="modal fade text-left bg-light" id="deletemodal" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-body pt-5">
                <p class="mb-3"><strong class="text-warning"><i class="bi bi-exclamation-triangle"></i> &nbsp; Delete</strong></p>
                <p>Are you sure, you wanna delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <a class="btn btn-warning ml-1" id="delete-modal-url" href="">Procced</a>
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="{{url('webroot/vendors/jquery/jquery-ui.min.js')}}"></script>
<script src="{{url('webroot/vendors/timepicker/timepicker.js')}}"></script>
<script>
    $(".panel_position").sortable({
        items: '.section-body',
        delay: 150,
        stop: function() {
            let selectedData = new Array();
            $('.section-body').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            updateOrder(selectedData);
        }
    });

    function updateOrder(data) {
        $.ajax({
            url: "{{ route('instructor.course.section_sort',[request()->operationID]) }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                position: data
            },
            success: function(data) {}
        })
    }
    $(".lesson-position").sortable({
        items: '.lesson-id',
        delay: 150,
        stop: function() {
            let selectedData = new Array();
            console.log(1234);
            $('.lesson-id').each(function() {
                selectedData.push($(this).attr("id"));
            });
            console.log(selectedData);
            // updateLessionOrder(selectedData);
        }
    });

    function updateLessionOrder(data) {
        // $.ajax({
        //     url: "{{ route('instructor.course.lesson_sort',[request()->operationID]) }}",
        //     type: 'POST',
        //     data: {
        //         _token: "{{ csrf_token() }}",
        //         position: data
        //     },
        //     success: function(data) {}
        // })
    }

    $('.curriculum-heading-edit').on('click', function() {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('#section-crud').html('Edit Section');
        $('#modal-section-id').val(id);
        $('#modal-section-name').val(name);
    });

    $('#sectionoperation .close-modal').on('click', function() {
        $('#section-crud').html('Add Section');
        $('#modal-section-id').val('');
        $('#modal-section-name').val('');
    });

    $(document).on('click', '.deletemodal', function() {
        let url = $(this).attr('data-url');
        $("#delete-modal-url").attr('href', url);
        console.log(url);
    });

    $('.lessonoperation').on('click', function() {
        let sec_id = $(this).attr('data-section');
        let form_url = "{{route('instructor.course.lesson_store',[request()->operationID])}}";
        let id = $(this).attr('data-id');
        $("#lesson-modal-body").parent().attr('action', form_url + "/" + sec_id);
        let url = "{{route('instructor.course.lesson',[request()->operationID])}}";
        // console.log(url+"/"+id);
        $.get(url + '/' + id,
            function(data, textStatus, jqXHR) {
                $("#lesson-modal-body").html(data);
                timepicker();
                setTimeout(() => {
                    $('.summernote').summernote()
                }, 300);
                $('#lesson-section-id').val(sec_id);
                $('#modal_lession_id').val(id);
            }
        );
    });

    $('.lesson_resource').on('click', function() {
        let form_url = "{{route('instructor.course.resource_store',[request()->operationID])}}";
        let id = $(this).attr('data-id');
        $("#resource_modal").attr('action', form_url + "/" + id);
        timepicker();
    });


    $(document).on('change', "#lesson-type", function() {
        let lesson_type = $(this).val();
        $("#resource_input").val('');
        let html = '';
        // $(".type-block").val('');
        // $(".type-block").parent().addClass('d-none');
        if (lesson_type == 'youtube' || lesson_type == 'vimeo') {
            html = ` <div class="form-group">
                                <label>Video code: <pub class="text-danger">*</pub></label>
                                <input type="text" placeholder="Enter video code" required name="resourse" class="form-control type-block">
                            </div>`;
        } else if (lesson_type == 'document') {
            html = `<div class="form-group">
                            <label>Document: <pub class="text-danger">*</pub></label>
                            <input type="file" name="resourse" class="form-control type-block" accept=".ppt, .pptx,.txt,.pdf" required>
                        </div>`;
        } else if (lesson_type == 'iframe') {
            html = `<div class="form-group">
                            <label>Iframe: <pub class="text-danger">*</pub></label>
                            <textarea name="resourse" class="form-control type-block" required rows="2"></textarea>
                        </div>`;
        } else if (lesson_type == 'link') {
            html = `<div class="form-group">
                            <label>Link: <pub class="text-danger">*</pub></label>
                            <input type="url" placeholder="Enter your link" required name="resourse" class="form-control type-block">
                        </div>`;
        }
        
        $("#resource_input").html(html);
    });

    function timepicker() {
        $('#duration').timepicker({
            timeFormat: 'HH:mm:ss',
            interval: 10
        });
    }
</script>
@endsection
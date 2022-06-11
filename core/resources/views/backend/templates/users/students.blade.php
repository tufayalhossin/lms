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
        "title" => $status . " Student",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => $status . " Student",
        "menus" => [
            [
                'active' => false,
                'label' => $status . ' student',
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
                <table class="table table-bordered dt-responsive nowrap data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
@include('backend.elements.datatable-script')
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>

@endsection
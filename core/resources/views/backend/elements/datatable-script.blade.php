<!-- Datatables js -->
<script src="{{url('webroot/app/js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{url('webroot/app/js/datatable/dataTables.bootstrap5.js')}}"></script>
<script src="{{url('webroot/app/js/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{url('webroot/app/js/datatable/responsive.bootstrap5.min.js')}}"></script>

<!-- Datatable Init js -->
<script src="{{url('webroot/app/js/datatable/demo.datatable-init.js')}}"></script>

<script>
    (function(global, factory) {

        "use strict";
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.category.list') }}",
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    });
</script>
@extends('layouts.admin')

@section('admin_content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" /> --}}
    <style>
        table,
        tr,
        th,
        td {
            text-align: center;
        }

        .modal-dialog {
            max-width: 750px;
            margin: 1.75rem auto;
        }
    </style>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-12">
                                        <h3 class="card-title">All Employees</h3>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row py-3">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <label for="">Select Departments</label>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <select name="dept_id" id="dept_id" class="form-control submitable">
                                            <option value="" selected disabled>Select Once</option>
                                            @foreach ($detps as $item)
                                                <option value="{{ $item->id }}">{{ $item->dept_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <table id="dataTable" class="table table-bordered table-striped">

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- category edit model --}}
    <!-- Modal -->
    <div class="modal fade" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Department </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="modal_body">

                </div>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table = $('#dataTable').DataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                searching: true,
                ajax: {
                    url: "{{ route('employee.index') }}",
                    data: function(e) {
                        e.dept_id = $('#dept_id').val();
                        // e.status = $('#status').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        title: "SL",
                        name: "DT_RowIndex",
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: "name",
                        title: "Employee Name ",
                        searchable: true
                    },
                    {
                        data: "contact",
                        title: "Phone",
                        searchable: true
                    },
                    {
                        data: "salary",
                        title: "Salary",
                        searchable: true
                    },
                    {
                        data: "dept_name",
                        title: "Department name",
                        searchable: true
                    },
                    {
                        data: "email",
                        title: "Email",
                        searchable: true
                    },
                    {
                        data: "status",
                        title: "Status",
                        searchable: true
                    },
                    {
                        data: "action",
                        title: "Action",
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        })
        //   {{-- active_status --}}
        $('body').on('click', '.active_status', function() {
            let id = $(this).data('id');
            var url = "{{ url('admin/active_status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    // alert(data);
                    toastr.success(data);
                    window.location.reload()
                }
            })
        })

        // {{--  deactive_status --}}
        $('body').on('click', '.deactive_status', function() {
            let id = $(this).data('id');
            // alert(id);
            var url = "{{ url('/admin/not_active_status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    window.location.reload()
                }
            })
        })
        // {{-- status ajax ends here --}}

        // submittable class call for evere change
        $(document).on('change', '.submitable', function() {
            $('#dataTable').DataTable().ajax.reload();
        })
    </script>

    <script>
        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');
            $.get("employees/edit/" + id, function(data) {
                $('#modal_body').html(data);

            })
        })
    </script>
@endsection

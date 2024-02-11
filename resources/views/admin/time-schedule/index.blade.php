@extends('layouts.admin')

@section('admin_content')
    <style>
        table,tr,th,td{
            text-align: center;
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
                                        <h3 class="card-title">All Schedules</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card_body pt-2 pl-5">
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

                                <!-- /.card-header -->
                                {{-- <div class="card-body"> --}}
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
    <div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Time Schedule </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="modal_body">

                </div>

            </div>
        </div>
    </div>

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
                    url: "{{ route('timeTable.index') }}",
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
                        data: "dept_name",
                        title: "Department Name ",
                        searchable: true
                    },
                    {
                        data: "intime",
                        title: "In_Time",
                        searchable: true
                    },
                    {
                        data: "outtime",
                        title: "Out_Time",
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

        // submittable class call for evere change
        $(document).on('change', '.submitable', function() {
            $('#dataTable').DataTable().ajax.reload();
        })
    </script>

    <script>
        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');
            $.get("time-table/edit/" + id, function(data) {
                $('#modal_body').html(data);

            })
        })
    </script>
@endsection

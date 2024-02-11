@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-12">
                                        <h3 class="card-title">Department Entry Form</h3>
                                    </div>
                                    {{-- <div class="col-lg-2 col-sm-12">
                                        <a href="{{ route('category.index') }}" class="btn btn-outline-primary">Add new</a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-5">
                              <div class="row">
                                <div class="col-lg-7 col-md-10 col-sm-12" style="border: 1px solid #ddd; margin:auto">
                                    <form action="{{ route('department.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 mt-3">
                                            <label for="name" class="form-label">Department :</label>
                                            <input type="text" class="form-control" value="{{ old('dept_name') }}"
                                                name="dept_name" id="dept_name" placeholder="Enter department name" required>
                                        </div>
                                        <div class="card-footer clearfix">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
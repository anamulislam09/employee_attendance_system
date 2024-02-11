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
                                        <h3 class="card-title">Employee Entry form</h3>
                                    </div>
                                    {{-- <div class="col-lg-2 col-sm-12">
                                        <a href="{{ route('category.index') }}" class="btn btn-outline-primary">Add new</a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-5">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="border: 1px solid #ddd; margin:auto">
                                        <form action="{{ route('employee.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Add New Employee</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <!-- general form elements -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Employee
                                                                            Name</label>
                                                                        <input type="text" name="name"
                                                                            class="form-control" value="{{ old('name') }}"
                                                                            id="" placeholder="Enter employee name"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Father`s
                                                                            name</label>
                                                                        <input type="text" name="f_name"
                                                                            value="{{ old('f_name') }}" class="form-control"
                                                                            id="" placeholder="Enter father`s name"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Mother`s
                                                                            name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('m_name') }}" name="m_name"
                                                                            id="m_name"
                                                                            placeholder="Enter mother`s name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleInputPassword1">blood_group</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('blood_group') }}"
                                                                            name="blood_group" id=""
                                                                            placeholder="Enter employee`s blood group">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Phone</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('contact') }}" name="contact"
                                                                            id=""
                                                                            placeholder="Enter contact number" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            value="{{ old('email') }}" name="email"
                                                                            id="" placeholder="Enter email" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"> Select
                                                                            Department</label>
                                                                        <select name="dept_id" id="dept_id"
                                                                            class="form-control @error('dept_id') is-invalid @enderror"
                                                                            required>
                                                                            <option value="" selected disabled>Select
                                                                                Once</option>
                                                                            @foreach ($data as $item)
                                                                                <option value="{{ $item->id }}">
                                                                                    {{ $item->dept_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Salary</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('salary') }}" name="salary"
                                                                            id="" placeholder="Enter salary" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"> Date Of Birth
                                                                        </label>
                                                                        <input type="date" name="birth_date"
                                                                            id="" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Join
                                                                            date</label>
                                                                        <input type="date" class="form-control"
                                                                            value="{{ old('join_date') }}"
                                                                            name="join_date" id="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"> Select Gender
                                                                        </label>
                                                                        <select name="dept_id" id="dept_id"
                                                                            class="form-control @error('gender') is-invalid @enderror"
                                                                            required>
                                                                            <option value="" selected disabled>Select
                                                                                Once</option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                            <option value="3">Others</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">
                                                                            Address</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ old('address') }}" name="address"
                                                                            id="" placeholder="Enter address" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="float: right">Submit</button>
                                                </div>

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

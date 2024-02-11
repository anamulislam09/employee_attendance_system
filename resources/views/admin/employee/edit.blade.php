<div class="card-body pb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" style="border: 1px solid #ddd; margin:auto">
            <form action="{{ route('employee.update') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit New Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- general form elements -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee
                                                Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $employee->name }}" id=""
                                                placeholder="Enter employee name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Father`s
                                                name</label>
                                            <input type="text" name="f_name" value="{{ $employee->f_name }}"
                                                class="form-control" id="" placeholder="Enter father`s name"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mother`s
                                                name</label>
                                            <input type="text" class="form-control" value="{{ $employee->m_name }}"
                                                name="m_name" id="m_name" placeholder="Enter mother`s name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">blood_group</label>
                                            <input type="text" class="form-control"
                                                value="{{ $employee->blood_group }}" name="blood_group" id=""
                                                placeholder="Enter employee`s blood group">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone</label>
                                            <input type="text" class="form-control" value="{{ $employee->contact }}"
                                                name="contact" id="" placeholder="Enter contact number"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" value="{{ $employee->email }}"
                                                name="email" id="" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Select
                                                Department</label>
                                            <select name="dept_id" id="dept_id"
                                                class="form-control @error('dept_id') is-invalid @enderror" required>
                                                <option value="" selected disabled>Select
                                                    Once</option>
                                                @foreach ($dept as $item)
                                                    <option value="{{ $item->id }}">
                                                        @if ($item->id == $employee->dept_id)
                                                            selected
                                                        @endif>
                                                        {{ $item->dept_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Salary</label>
                                            <input type="text" class="form-control" value="{{ $employee->email }}"
                                                name="salary" id="" placeholder="Enter salary" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Date Of Birth
                                            </label>
                                            <input type="date" value="{{ $employee->birth_date }}" name="birth_date"
                                                id="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Join
                                                date</label>
                                            <input type="date" class="form-control"
                                                value="{{ $employee->join_date }}" name="join_date" id=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Select Gender
                                            </label>
                                            <select name="gender" id="dept_id"
                                                class="form-control @error('gender') is-invalid @enderror" required>
                                                <option value="" selected disabled>Select
                                                    Once</option>
                                                <option value="1"
                                                    @if ($employee->dept_id == 1) selected @endif>Male</option>
                                                <option value="2"
                                                    @if ($employee->dept_id == 2) selected @endif>Female</option>
                                                <option value="3"
                                                    @if ($employee->dept_id == 3) selected @endif>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">
                                                Address</label>
                                            <input type="text" class="form-control"
                                                value="{{ $employee->address }}" name="address" id=""
                                                placeholder="Enter address" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

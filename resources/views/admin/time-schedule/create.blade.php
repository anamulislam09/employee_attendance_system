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
                                        <h3 class="card-title">Department wise time set</h3>
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
                                    <form action="{{ route('time-table.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 mt-3">
                                            <label for="name" class="form-label">Department :</label>

                                            <select name="dept_id" id="" class="form-control" required>
                                                <option value="" selected disabled>Select Once</option>
                                                @foreach ($dept as $item)
                                                    <option value="{{$item->id}}">{{$item->dept_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="time_in" class="col-sm-3 control-label">Time In</label>
                    
                                            
                                                <div class="bootstrap-timepicker">
                                                    <input type="time" class="form-control timepicker" id="time_in" name="time_in" required>
                                                </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="time_out" class="col-sm-3 control-label">Time Out</label>
                    
                                            
                                                <div class="bootstrap-timepicker">
                                                    <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
                                                </div>
                                            
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
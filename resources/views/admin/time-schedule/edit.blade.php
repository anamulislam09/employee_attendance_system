<div class="card-body pb-5">
    {{-- <div class="row"> --}}
        {{-- <div class="col-lg-7 col-md-10 col-sm-12" style="border: 1px solid #ddd; margin:auto"> --}}
            <form action="{{ route('time-table.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Department :</label>

                    <select name="dept_id" id="" class="form-control" required>
                        <option value="" selected disabled>Select Once</option>
                        @foreach ($dept as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $data->dept_id) selected @endif>
                                {{ $item->dept_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="time_in" class="col-sm-3 control-label">Time In</label>

                    <div class="bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" value="{{ $data->intime }}" id="time_in"
                            name="time_in" required>
                    </div>

                </div>
                <div class="form-group">
                    <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                    <div class="bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" value="{{ $data->outtime }}"
                            id="time_out" name="time_out" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
            </form>
        {{-- </div>
    </div> --}}
</div>

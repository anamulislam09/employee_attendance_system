<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Facades\DataTables;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // index method 
     public function Index(Request $request)
     {
         if ($request->ajax()) {
             $employee = "";
             $query = DB::table('time_tables')->leftJoin('departments', 'time_tables.dept_id', 'departments.id');
             if ($request->dept_id) {
                 $query->where('time_tables.dept_id', $request->dept_id);
             }
             $times = $query->select('time_tables.*', 'departments.dept_name')->get();

             return DataTables::of($times)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $actionbtn = ' 
                    <a href="" class="btn btn-sm btn-info edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editSchedule"><i class="fas fa-edit"></i></a>
                      <a href="' . route('time-table.delete', [$row->id]) . '"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                     return $actionbtn;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
 
         $detps = Department::all();
         return view('admin.time-schedule.index', compact('detps'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        $dept = Department::all();
        return view('admin.time-schedule.create', compact('dept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request)
    {
        TimeTable::insert([
            'dept_id' => $request->dept_id,
            'intime' => $request->time_in,
            'outtime' => $request->time_out,
        ]);

        return redirect()->back()->with('message' , 'Time Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeTable $timeTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit($id)
    {
        $data = TimeTable::findOrFail($id);
        $dept = Department::all();
        return view('admin.time-schedule.edit', compact('data', 'dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request)
    {
        $id = $request->id;
        // Using Querybuilder
        $data = TimeTable::findOrFail($id);

        $data['dept_id'] = $request->dept_id;
        $data['intime'] = $request->time_in;
        $data['outtime'] = $request->time_out;
        $data->save();

        return redirect()->back()->with('message', 'Schedule Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeTable $timeTable)
    {
        //
    }
}

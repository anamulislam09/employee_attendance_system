<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
      // show all employee 
     // index method 
     public function Index(Request $request)
     {
         if ($request->ajax()) {
             $employee = "";
             $query = DB::table('employees')->leftJoin('departments', 'employees.dept_id', 'departments.id');
             if ($request->dept_id) {
                 $query->where('employees.dept_id', $request->dept_id);
             }
            //  if($request->status==1){
            //      $query->where('employees.status',1);
            //  }elseif($request->status==0){
            //      $query->where('employees.status',0);
            //  }
             $employee = $query->select('employees.*', 'departments.dept_name')->get();
            //  dd($employee);

             return DataTables::of($employee)
                 ->addIndexColumn()
                 //status column start here
                 ->editColumn('status', function ($row) {
                     if ($row->status == 1) {
                         return ' <a href="#" data-id= "' . $row->id . '"class="deactive_status" ><i class="fas fa-thumbs-down text-danger pr-1"></i><span class="badge badge-success ">active</span></a>';
                     } else {
                         return ' <a href="#" data-id= "' . $row->id . '" class="active_status" ><i class="fas fa-thumbs-up text-primary pr-1"></i><span class="badge badge-danger ">deactive</span></a>';
                     }
                 })         //status column ends here
                 ->addColumn('action', function ($row) {
                     $actionbtn = ' 
                     <a href="" class="btn btn-sm btn-info edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editemployee"><i class="fas fa-edit"></i></a>
                     <a href="" class="btn btn-sm btn-primary" ><i class="fas fa-eye"></i></a> 
                      <a href="' . route('employee.delete', [$row->id]) . '"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                     return $actionbtn;
                 })
                 ->rawColumns(['action', 'status'])
                 ->make(true);
         }
 
         $detps = Department::all();
         return view('admin.employee.index', compact('detps'));
     }


         // activeTodayDeal method 
    public function activeStatus($id)
    {
        $data = Employee::findOrFail($id);
        $data->update(['status' => 1]);
        return response()->json('Employee status Activated');
    }
    // notTodayDeal method 
    public function notActiveStatus($id)
    {
        DB::table('employees')->where('id', $id)->update(['status' => 0]);
        return response()->json('Employee status Not Activated');
    }
    // status method ends here
  
      //  create departmentr 
      public function Create()
      {
        $data = Department::get();
          return view('admin.employee.create', compact('data'));
      }
  
      // store departmentr 
      public function Store(Request $request)
      {
          $data = Employee::where('email', $request->email)->exists();
          if ($data) {
              return redirect()->back()->with('message', 'This email already used!');
          } else {
              $data['name'] = $request->name;
              $data['f_name'] = $request->f_name;
              $data['m_name'] = $request->m_name;
              $data['contact'] = $request->contact;
              $data['blood_group'] = $request->blood_group;
              $data['gender'] = $request->gender;
              $data['salary'] = $request->salary;
              $data['dept_id'] = $request->dept_id;
              $data['join_date'] = $request->join_date;
              $data['birth_date'] = $request->birth_date;
              $data['email'] = $request->email;
              $data['address'] = $request->address;
              Employee::create($data);
              return redirect()->route('employee.index')->with('message', 'Employee Created Successfully');
          }
      }

      public function Edit($id)
      {
          $employee = Employee::findOrFail($id);
          $dept = Department::all();
          return view( 'admin.employee.edit', compact('dept', 'employee'));
      }
  
      // delete method 
      public function Delete($id)
      {
          $data = Employee::findOrFail($id);
          $data->delete();
          return redirect()->route('employee.index')->with('message', 'Department deleted successfully.');
      }
}

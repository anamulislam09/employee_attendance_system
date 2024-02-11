<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // show all departmentr 
    public function Index()
    {
        $data = Department::get();
        return view('admin.department.index', compact('data'));
    }

    //  create departmentr 
    public function Create()
    {
        return view('admin.department.create');
    }

    // store departmentr 
    public function Store(Request $request)
    {
        $data = Department::where('dept_name', $request->dept_name)->exists();
        if ($data) {
            return redirect()->back()->with('message', 'This Department already used!');
        } else {
            $data['dept_name'] = $request->dept_name;
            Department::create($data);
            return redirect()->route('department.index')->with('message', 'Department Inserted Successfully');
        }
    }

    // delete method 
    public function Delete($id)
    {
        $data = Department::findOrFail($id);
        $data->delete();
        return redirect()->route('department.index')->with('message', 'Department deleted successfully.');
    }
}

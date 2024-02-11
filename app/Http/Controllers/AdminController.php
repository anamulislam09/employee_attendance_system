<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // login method start here 
    public function Index()
    {
        return view('admin.pages.admin_login');
    } //end method

    public function Dashboard()
    {
        return view('admin.index');
    } //end method

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('web')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('message', 'Login Successfully');
        } else {
            return back()->with('message', 'Invalid Email or Password! ');
        }
        //end method
    }
    // login method ends here 

    // register method start here
    public function AdminRegister()
    {
        return view('admin.pages.admin_register');
    } //end method

    public function store(Request $request)
    {
        $email = User::where('email', $request->email)->exists();
        if ($email) {
            return redirect()->back()->with('message', 'This Email already used!');
        } else {
            // $id = UniqueIdGenerator::generate(['table' => 'customers', 'length' => 4]);
            $start_at = 1001;

            if ($start_at) {
                $user = User::find($start_at);
                if (!$user) {
                    $data['id'] = $start_at;
                }
            }

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            return redirect()->route('login_form')->with('message', 'Admin register Successfully');
            //end method
        }
    }

    // register method ends here

    // Logout method ends here
    public function AdminLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login_form')->with('message', 'Admin Logout Successfully');
        //end method
    }
    // Logout method ends here

    /*-------------------Customers related method start here--------------*/
}

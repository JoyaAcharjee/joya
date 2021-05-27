<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;

class AuthController extends Controller
{
    public function login(){
        if (Session::has('username')){
            return redirect()->to('dashboard');
        }
        return view('login');
    }
    public function loginstore(Request $request){
        $email = $request->email;
        $password = $request->password;

        $emp = Student::where('email','=',$email)
                        ->where('password','=',$password)
                        ->first();
//        echo $emp->created_at;
//        dd($emp);
        if($emp)
        {
            //set data in session
            $name=$emp->name;
            $role=$emp->role;
            $id=$emp->id;
            Session::put('username', $name);
            Session::put('userrole', $role);
            Session::put('id', $id);

            return redirect()->to('dashboard');
        }
        else
        {
            //show an error message using bootstrap alert
            return redirect()->back()->with('msg','Invalid email or password');
        }
    }
    public function logout(){
        Session::flash('username');
        Session::flash('userrole');
        return redirect()->to('login');
    }
}

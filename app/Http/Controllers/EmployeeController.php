<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        //get all employees form the database table
        //select * from employees
        $employees = Employee::all();
        //send the results to the view
        return view('admin.pages.employees', compact('employees'));
    }
    public function create(){
        return view('admin.pages.create');
    }
    public function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $age = $request->age;
        $gender= $request->gender;
        $is_active= $request->boolean('is_active');
        $role= $request->role;
        $password= $request->password;
//        $salary = $request->salary;
//        $details = $request->details;
        $obj= new Employee(); //create object of Employee class
        $obj->name = $name;
        $obj->email = $email;
        $obj->age=$age;
        $obj->gender=$gender;
        $obj->is_active=$is_active;
        $obj->role=$role;
        $obj->password=$password;
//        $obj->salary=$salary;
//        $obj->details=$details;

        if ($obj->save()){
//            echo 'Successfully Inserted';
            return redirect()->to('employees');
        }
    }
    public function edit($id){
//        $employee= Employee::where('id','=',$id)->get();  //returns an array
            $employee = Employee::find($id); //Returns an object. in the function, primary key value must be passed
        return view('edit',compact('employee'));
    }
    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->gender = $request->input('gender');
        $employee->is_active = $request->boolean('is_active');
        $employee->role = $request->role;
        if($employee->save()){
            return redirect()->to('employees');
        }
    }
    public function delete($id){
        $employee= Employee::find($id);
        if($employee->delete()){
            return redirect()->to('employees');
        }
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        //get all employees form the database table
        //select * from employees
        $students = Student::all();
        //send the results to the view
        return view('admin.pages.student.student', compact('students'));
    }
    public function create(){
        return view('admin.pages.student.create_student');
    }
    public function store(Request $request){
        // $name = $request->name;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'student_id' => 'required|integer|unique:students,student_id',
            'role' => 'required',
            // 'student_id' => 'required|section|unique:sections,section',
            // 'dob' => 'required|date_format:Y-m-d|before_or_equal:'.$todayDate,

        ]);
        $obj= new Student(); //create object of Session class
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->student_id = $request->student_id;
        $obj->role = $request->role;
        $obj->password = $request->password;
        if ($obj->save()){
        //    echo 'Successfully Inserted';
            return redirect()->to('student');
        }
    }
    public function edit($id){
        //        $employee= Employee::where('id','=',$id)->get();  //returns an array
                    $student = Student::find($id); //Returns an object. in the function, primary key value must be passed
             
            //  print_r($session);
             
            //         die();
                    return view('admin.pages.student.edit_student',compact('student'));
            }
    public function update(Request $request, $id){
                $section = Student::find($id);
                $section->name = $request->name;  
                $section->email = $request->email;
                $section->student_id = $request->student_id;
                $section->role = $request->role;              
                if($section->save()){
                    return redirect()->to('student');
                }
            }
    public function delete($id){
                $section= Student::find($id);
                if($section->delete()){
                    return redirect()->to('student');
                }
            }
}

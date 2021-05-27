<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionName;

class SessionController extends Controller
{
    public function index(){
        //get all employees form the database table
        //select * from employees
        $sessions = SessionName::all();
        //send the results to the view
        return view('admin.pages.session', compact('sessions'));
    }
    public function create(){
        return view('admin.pages.create_session');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:session_names,session'
            // 'email' => 'required|email'
            ,
            // 'student_id' => 'required|section|unique:sections,section',
            // 'dob' => 'required|date_format:Y-m-d|before_or_equal:'.$todayDate,

        ]);
        $name = $request->name;
        $status= $request->boolean('status');
        $obj= new SessionName(); //create object of Session class
        $obj->session = $name;
        $obj->status=$status;
        if ($obj->save()){
        //    echo 'Successfully Inserted';
            return redirect()->to('session');
        }
    }
    public function edit($id){
        //        $employee= Employee::where('id','=',$id)->get();  //returns an array
                    $sess = SessionName::find($id); //Returns an object. in the function, primary key value must be passed
             
            //  print_r($session);
             
            //         die();
                    return view('admin.pages.edit_session',compact('sess'));
            }
    public function update(Request $request, $id){
                $session = SessionName::find($id);
                $session->session = $request->name;
                $session->status = $request->boolean('status');
                if($session->save()){
                    return redirect()->to('session');
                }
            }
    public function delete($id){
                $sessions= SessionName::find($id);
                if($sessions->delete()){
                    return redirect()->to('session');
                }
            }
}

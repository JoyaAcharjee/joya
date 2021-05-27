<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        // $subjects = Subject::join('subject_types','subjects.sub_type','subject_types.id')
        //    ->select('subjects.id','subjects.sub_name as subjects','subjects.sub_code','subjects.sub_shortname',
        //    'subject_types.sub_type as sub_type')
        //    ->orderBy('subjects.id')
        //    ->get();
        // $subjects = DB::table('subjects')  //query builder is faster than eloquent
        //             ->join('subject_types','subjects.sub_type','subject_types.id')
        //             ->select('subjects.id','subjects.sub_name as subject','subjects.sub_code',
        //             'subjects.sub_shortname','subject_types.sub_type as sub_type')
        //             ->orderBy('subjects.id', 'asc')
        //             ->get();
        return view('admin.pages.subject.subject',compact('subjects'));
    }
    public function create(){ 
        
        return view('admin.pages.subject.create_subject');
    }
    public function store(Request $request){
        
        $validated = $request->validate([
            'sub_name' => 'required|unique:subjects,sub_name',
            'sub_code' => 'required|unique:subjects,sub_code',
            'sub_shortname' => 'required|unique:subjects,sub_shortname',
            'sub_type' => 'required',
            // 'student_id' => 'required|section|unique:sections,section',
            // 'dob' => 'required|date_format:Y-m-d|before_or_equal:'.$todayDate,

        ]);
        
        $sub_name    = $request->sub_name;
        $sub_code    = $request->sub_code;
        $sub_shortname    = $request->sub_shortname;
        $sub_type    = $request->sub_type;


        //echo 'Name is: '.$result;
     //  if($request->has('checkbox_name')){
        //Checkbox checked
        //$status=1;
    //}else{
        //Checkbox not checked
      //  $status=0;
    //}
    //echo 'Name is: '.$status;
   // $isActive ='checkbox_name' => 'boolean';
    //echo 'Name is: '.$isActive;

        $obj=new Subject();
        $obj->sub_name=$sub_name;
        $obj->sub_code=$sub_code;
        $obj->sub_shortname=$sub_shortname;
        $obj->sub_type=$sub_type;

        if($obj->save()){
           // return  redirect()->to('employees');
          // echo'Inserted successfully';
          return redirect()->back()->with('msg','Successfully Inserted');
        }
    }
    public function edit($id){
        //$employee=Employee::where('id','=',$id)->get();
        $subjects=Subject::find($id);
        return view('admin.pages.subject.edit_subject',compact('subjects'));
    }
    public function update(Request $request,$id){
        $subject=Subject::find($id);
        $subject->sub_name=$request->sub_name;
        $subject->sub_code=$request->sub_code;
        $subject->sub_shortname=$request->sub_shortname;
        $subject->sub_type=$request->sub_type;


        if($subject->save()){
            return redirect()->to('subject');
           //echo'upate';
        }

    }
    public function delete($id){
        $subject=Subject::find($id);
        //echo 'Name is: '.$employee->name;
        if($subject->delete()){
            return  redirect()->to('subject');
        }
    }
}

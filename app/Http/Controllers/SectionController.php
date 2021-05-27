<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(){
        //get all employees form the database table
        //select * from employees
        $sections = Section::all();
        //send the results to the view
        return view('admin.pages.section.section', compact('sections'));
    }
    public function create(){
        return view('admin.pages.section.create_section');
    }
    public function store(Request $request){
        // $name = $request->name;
        $validated = $request->validate([
        //     // 'name' => 'required',
        //     'section' => 'required|section|unique:sections,section',
        //     //'dob' => 'required|date_format:Y-m-d|before_or_equal:'.$todayDate,
        'name' => 'required|unique:sections,section'

        ]);
        $obj= new Section(); //create object of Session class
        $obj->section = $request->name;
        if ($obj->save()){
        //    echo 'Successfully Inserted';
            return redirect()->to('section');
        }
    }
    public function edit($id){
        //        $employee= Employee::where('id','=',$id)->get();  //returns an array
                    $sec = Section::find($id); //Returns an object. in the function, primary key value must be passed
             
            //  print_r($session);
             
            //         die();
                    return view('admin.pages.section.edit_section',compact('sec'));
            }
    public function update(Request $request, $id){
                $section = Section::find($id);
                $section->section = $request->name;                
                if($section->save()){
                    return redirect()->to('section');
                }
            }
    public function delete($id){
                $section= Section::find($id);
                if($section->delete()){
                    return redirect()->to('section');
                }
            }
}

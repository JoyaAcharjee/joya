<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SessionName;
use Illuminate\Support\Facades\DB;
use App\Models\StudentEnrollment;
use App\Models\Section;
use App\Models\Type;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    public function indexrequest(){
        $subjects = Subject::all();
        $sessions = SessionName::all();
        $sections = Section::all();
        $types = Type::all();
        //return view('admin.pages.sessions',compact('sessions'));
        return view('student.pages.enroll',compact('subjects','sessions','sections','types'));
    }
    public function index(){
        //$student_id=Session::get('id');
        // $id= $request->id;
        // print_r($id);
        $course= StudentEnrollment::all();
        $number=count($course);
        //$subjects = Subject::all();
        $subjects = Subject::all();
        $number=count($subjects);

        $courseArray = array();
        //for($i=0;$i<$number;$i++){
        foreach($subjects as $subject){
            $courses = DB::table('student_enrollments')
               ->where('sub_id',"=",$subject['id'])
               ->get();
               array_push($courseArray,$courses);}
               return view('student.pages.requestedcourse',compact('courseArray'));





        //$course= StudentEnrollment::where('student_id','=',$student_id)->get();
        // $course= StudentEnrollment:: join('sections','student_enrollments.section','sections.id')
        // ->select('student_enrollments.id','student_enrollments.student_id','student_enrollments.sub_id','student_enrollments.sub_name','student_enrollments.sub_code','student_enrollments.sub_shortname','student_enrollments.sub_type','student_enrollments.session','student_enrollments.course_type','sections.section as section')
        // ->get();
        // $course = DB::table('student_enrollments')
        // ->join('sections','student_enrollments.section','sections.id')
        // ->join('types','student_enrollments.course_type','types.id')
        // ->select('student_enrollments.id','student_enrollments.student_id','student_enrollments.sub_id','student_enrollments.sub_name','student_enrollments.sub_code','student_enrollments.sub_shortname','student_enrollments.sub_type','student_enrollments.session','types.t_name as type','sections.section as section')
        // ->orderBy('student_enrollments.id', 'asc')
        // // ->where('student_enrollments.student_id','$student_id')
        // ->get();
        //return view('admin.pages.sessions',compact('sessions'));
        //return view('student.pages.requestedcourse',compact('course'));
    }
    public function storerequest(Request $request){
        /**$checkbox=$request->checkbox;
        //$sub_type=$request->sub_type;
        $sub_type=Session::get('username');

        for($i=0;$i<count($checkbox);$i++)
        {
            $datasave=[

                //'sub_id'=>$checkbox[$i],
                'sub_id'=>$sub_type,
                'subject_id'=>$checkbox[$i],

            ];
            //return dd($datasave);
            DB::table('enrollmentstus')->insert($datasave);

        }
        return redirect()->back();**/

        if(!empty($request->input('checkbox'))){
            $will_insert=[];
            $will_sert=[];
            $student_id=Session::get('id');
            $sessionname=$request->session;
            // print_r($sessioname);


            foreach($request->input('checkbox') as $key=>$value){
                $subject=Subject::find($value);
                // $validated = $request->validate([
                //     // 'checkbox'=> 'required|unique:student_enrollments,session',
                //     // 'sub_name' => 'required|unique:student_enrollments,sub_name'
                //     // 'sub_name' => 'required',
                //     // 'sub_code' => 'required|unique:student_enrollments,sub_name',
                //     // 'sub_shortname' => 'required|unique:student_enrollments,sub_shortname',
                //     // 'sub_type' => 'required',
                //     // 'student_id' => 'required|section|unique:sections,section',
                //     // 'dob' => 'required|date_format:Y-m-d|before_or_equal:'.$todayDate,


                // ]);
                $subjectname=$subject->sub_name;
                $subjectcode=$subject->sub_code;
                $subjectshortname=$subject->sub_shortname;
                $subjecttype=$subject->sub_type;
                $sec_name = $request-> section_name;
                $course_name = $request-> course_name;

                DB::table('student_enrollments')->insert(
                    array('student_id' => $student_id, 'sub_id' => $value,'sub_name'=>$subjectname,
                    'sub_code'=>$subjectcode,'sub_shortname'=>$subjectshortname,
                    'sub_type'=>$subjecttype,'session'=>$sessionname,
                    'course_type' => $request->course_name[$key])
                );

                //array_push($will_sert,['sub_id'=>$sub_type]);
                //array_push($will_insert,['subject_id'=>$value]);


            }
           // DB::table('enrollmentstus')->insert($will_sert,$will_insert,);
        }
        return redirect()->to('create-enroll');

    }

    public function to_power($array){
        $results = array(array());
        foreach($array as $element){
            foreach($results as $combination){
                array_push($results,array_merge(array($element),$combination));
            }
        }
        return $results;
    }
    public function l(Request $request){
        $course= StudentEnrollment::all();
        $course_num=count($course);
        //$subjects = Subject::all();
        $subjects = Subject::all();
        $s=array();
        foreach($subjects as $subject){
            array_push($s,$subject['id']);
        }
        ///echo json_encode($this->to_power($s));
        $subject_num=count($subjects);

        $courseArray = array();
        //for($i=0;$i<$number;$i++){
        $r=array();
        $s = $this->to_power($s);
        foreach($s as $s1){
            //echo $s1."\t";
            if(count($s1)==0){
                continue;
            }
            $r1=array();
            foreach($s1 as $s2){
                $r2 =  DB::table('student_enrollments')
                    ->where('sub_id',"=",$subjects[$s2-1]['id'])
                    ->get();
                array_push($r1,$r2);
            }
            array_push($r,$r1);
        }
        return json_encode($r);
        for($i=0;i<$subject_num;$i++){
            $courses = DB::table('student_enrollments')
               ->where('sub_id',"=",$subjects[i]['id'])
               ->get();
               array_push($courseArray,$courses);
        }
      return json_encode($courseArray,JSON_PRETTY_PRINT);
    }



}

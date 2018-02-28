<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shedule;
use App\Teacher;
use App\TeacherDiscipline;
use App\DaysOfWeek;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function CreateTeacherIndex(){
        return view('admin.CreateTeacher');
    }

    public function CreateTeacher(Request $request){
        $monday_id=DaysOfWeek::where('name','Monday')->first();
        $tuesday_id=DaysOfWeek::where('name','Tuesday')->first();
        $wednesday_id=DaysOfWeek::where('name','Wednesday')->first();
        $thursday_id=DaysOfWeek::where('name','Thursday')->first();
        $friday_id=DaysOfWeek::where('name','Friday')->first();

        $firsName=$request->input('first_name');
        $lastName=$request->input('last_name');
        $function=$request->input('function');
        $didacticLevel=$request->input('didactic_level');
        $cabinet=$request->input('cabinet');
        $email=$request->input('email');
        $image=$request->file('image');
        $extensions=['png','jpg','jpeg','bmp','gif'];

        $test=Teacher::where('first_name',$firsName)->where('last_name',$lastName)->first();
        if($test){
            return redirect()->back()->with('error_message','Teacher already exist !');
        }
        if(!in_array($image->guessClientExtension(),$extensions)){
            return redirect()->back()->with('error_message','Extension of image is not supported !');
        }

        $imageName=uniqid().'.'.$image->guessClientExtension();


        $image->storeAs('images/teachers',$imageName,'uploads');

        $disciplines=$request->input('checkbox');

        $teacher=new Teacher();
        $teacher->first_name=$firsName;
        $teacher->last_name=$lastName;
        $teacher->function=$function;
$teacher->image=$imageName;
        $teacher->didactic_level=$didacticLevel;
        $teacher->cabinet=$cabinet;
        $teacher->email=$email;



        $teacher->save();

        foreach ($disciplines as $discipline){
            $union=new TeacherDiscipline();
            $union->teacher_id=$teacher->id;
            $union->discipline_id=$discipline;
            $union->save();
        }

        $monday_1=$request->input('monday_1');
        $monday_2=$request->input('monday_2');
        $monday_3=$request->input('monday_3');
        $monday_4=$request->input('monday_4');
        $monday_5=$request->input('monday_5');
        $monday_6=$request->input('monday_6');
        $monday_7=$request->input('monday_7');

        $monday= new Shedule();
        $monday->lesson_1=$monday_1;
        $monday->lesson_2=$monday_2;
        $monday->lesson_3=$monday_3;
        $monday->lesson_4=$monday_4;
        $monday->lesson_5=$monday_5;
        $monday->lesson_6=$monday_6;
        $monday->lesson_7=$monday_7;
        $monday->day_of_week_id=$monday_id->id;
        $monday->teacher_id=$teacher->id;
        $monday->save();

        $tuesday_1=$request->input('tuesday_1');
        $tuesday_2=$request->input('tuesday_2');
        $tuesday_3=$request->input('tuesday_3');
        $tuesday_4=$request->input('tuesday_4');
        $tuesday_5=$request->input('tuesday_5');
        $tuesday_6=$request->input('tuesday_6');
        $tuesday_7=$request->input('tuesday_7');

        $tuesday= new Shedule();
        $tuesday->lesson_1=$tuesday_1;
        $tuesday->lesson_2=$tuesday_2;
        $tuesday->lesson_3=$tuesday_3;
        $tuesday->lesson_4=$tuesday_4;
        $tuesday->lesson_5=$tuesday_5;
        $tuesday->lesson_6=$tuesday_6;
        $tuesday->lesson_7=$tuesday_7;
        $tuesday->day_of_week_id=$tuesday_id->id;
        $tuesday->teacher_id=$teacher->id;
        $tuesday->save();

        $wednesday_1=$request->input('wednesday_1');
        $wednesday_2=$request->input('wednesday_2');
        $wednesday_3=$request->input('wednesday_3');
        $wednesday_4=$request->input('wednesday_4');
        $wednesday_5=$request->input('wednesday_5');
        $wednesday_6=$request->input('wednesday_6');
        $wednesday_7=$request->input('wednesday_7');

        $wednesday= new Shedule();
        $wednesday->lesson_1=$wednesday_1;
        $wednesday->lesson_2=$wednesday_2;
        $wednesday->lesson_3=$wednesday_3;
        $wednesday->lesson_4=$wednesday_4;
        $wednesday->lesson_5=$wednesday_5;
        $wednesday->lesson_6=$wednesday_6;
        $wednesday->lesson_7=$wednesday_7;
        $wednesday->day_of_week_id=$wednesday_id->id;
        $wednesday->teacher_id=$teacher->id;
        $wednesday->save();

        $thursday_1=$request->input('thursday_1');
        $thursday_2=$request->input('thursday_2');
        $thursday_3=$request->input('thursday_3');
        $thursday_4=$request->input('thursday_4');
        $thursday_5=$request->input('thursday_5');
        $thursday_6=$request->input('thursday_6');
        $thursday_7=$request->input('thursday_7');

        $thursday= new Shedule();
        $thursday->lesson_1=$thursday_1;
        $thursday->lesson_2=$thursday_2;
        $thursday->lesson_3=$thursday_3;
        $thursday->lesson_4=$thursday_4;
        $thursday->lesson_5=$thursday_5;
        $thursday->lesson_6=$thursday_6;
        $thursday->lesson_7=$thursday_7;
        $thursday->day_of_week_id=$thursday_id->id;
        $thursday->teacher_id=$teacher->id;
        $thursday->save();

        $friday_1=$request->input('friday_1');
        $friday_2=$request->input('friday_2');
        $friday_3=$request->input('friday_3');
        $friday_4=$request->input('friday_4');
        $friday_5=$request->input('friday_5');
        $friday_6=$request->input('friday_6');
        $friday_7=$request->input('friday_7');

        $friday= new Shedule();
        $friday->lesson_1=$friday_1;
        $friday->lesson_2=$friday_2;
        $friday->lesson_3=$friday_3;
        $friday->lesson_4=$friday_4;
        $friday->lesson_5=$friday_5;
        $friday->lesson_6=$friday_6;
        $friday->lesson_7=$friday_7;
        $friday->day_of_week_id=$friday_id->id;
        $friday->teacher_id=$teacher->id;
        $friday->save();

        return redirect()->back()->with('message','Teacher created successfully! ');

    }

    public function EditTeacher(Request $request){


        $monday_id=DaysOfWeek::where('name','Monday')->first();
        $tuesday_id=DaysOfWeek::where('name','Tuesday')->first();
        $wednesday_id=DaysOfWeek::where('name','Wednesday')->first();
        $thursday_id=DaysOfWeek::where('name','Thursday')->first();
        $friday_id=DaysOfWeek::where('name','Friday')->first();

        $firsName=$request->input('first_name');
        $lastName=$request->input('last_name');
        $function=$request->input('function');
        $didacticLevel=$request->input('didactic_level');
        $cabinet=$request->input('cabinet');
        $email=$request->input('email');
        $image=$request->file('image');
        $extensions=['png','jpg','jpeg','bmp','gif'];

        $teacher=Teacher::where('id',$request->input('id'))->first();
        if(!$teacher){
            return redirect()->back()->with('error_message','Teacher does not exist !');
        }
        if(isset($image)){
            if(!in_array($image->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of image is not supported !');
            }

            $imageName=uniqid().'.'.$image->guessClientExtension();

            $teacher->image=$imageName;
            $image->storeAs('public/images/',$imageName,'uploads');}

        $disciplines=$request->input('checkbox');
        $teacher->first_name=$firsName;
        $teacher->last_name=$lastName;
        $teacher->function=$function;
        $teacher->didactic_level=$didacticLevel;
        $teacher->cabinet=$cabinet;
        $teacher->email=$email;



        $teacher->save();
        $teacher_disciplines=TeacherDiscipline::where('teacher_id',$teacher->id)->pluck('discipline_id')->toArray();

        foreach ($disciplines as $discipline){
            if(!in_array($discipline,$teacher_disciplines)){
                $union=new TeacherDiscipline();
                $union->teacher_id=$teacher->id;
                $union->discipline_id=$discipline;
                $union->save();}
        }

        $monday_1=$request->input('monday_1');
        $monday_2=$request->input('monday_2');
        $monday_3=$request->input('monday_3');
        $monday_4=$request->input('monday_4');
        $monday_5=$request->input('monday_5');
        $monday_6=$request->input('monday_6');
        $monday_7=$request->input('monday_7');

        $monday= Shedule::where('teacher_id',$teacher->id)->where('day_of_week_id',1)->first();
        $monday->lesson_1=$monday_1;
        $monday->lesson_2=$monday_2;
        $monday->lesson_3=$monday_3;
        $monday->lesson_4=$monday_4;
        $monday->lesson_5=$monday_5;
        $monday->lesson_6=$monday_6;
        $monday->lesson_7=$monday_7;
        $monday->day_of_week_id=$monday_id->id;
        $monday->teacher_id=$teacher->id;
        $monday->save();

        $tuesday_1=$request->input('tuesday_1');
        $tuesday_2=$request->input('tuesday_2');
        $tuesday_3=$request->input('tuesday_3');
        $tuesday_4=$request->input('tuesday_4');
        $tuesday_5=$request->input('tuesday_5');
        $tuesday_6=$request->input('tuesday_6');
        $tuesday_7=$request->input('tuesday_7');

        $tuesday= Shedule::where('teacher_id',$teacher->id)->where('day_of_week_id',2)->first();
        $tuesday->lesson_1=$tuesday_1;
        $tuesday->lesson_2=$tuesday_2;
        $tuesday->lesson_3=$tuesday_3;
        $tuesday->lesson_4=$tuesday_4;
        $tuesday->lesson_5=$tuesday_5;
        $tuesday->lesson_6=$tuesday_6;
        $tuesday->lesson_7=$tuesday_7;
        $tuesday->day_of_week_id=$tuesday_id->id;
        $tuesday->teacher_id=$teacher->id;
        $tuesday->save();

        $wednesday_1=$request->input('wednesday_1');
        $wednesday_2=$request->input('wednesday_2');
        $wednesday_3=$request->input('wednesday_3');
        $wednesday_4=$request->input('wednesday_4');
        $wednesday_5=$request->input('wednesday_5');
        $wednesday_6=$request->input('wednesday_6');
        $wednesday_7=$request->input('wednesday_7');

        $wednesday= Shedule::where('teacher_id',$teacher->id)->where('day_of_week_id',3)->first();
        $wednesday->lesson_1=$wednesday_1;
        $wednesday->lesson_2=$wednesday_2;
        $wednesday->lesson_3=$wednesday_3;
        $wednesday->lesson_4=$wednesday_4;
        $wednesday->lesson_5=$wednesday_5;
        $wednesday->lesson_6=$wednesday_6;
        $wednesday->lesson_7=$wednesday_7;
        $wednesday->day_of_week_id=$wednesday_id->id;
        $wednesday->teacher_id=$teacher->id;
        $wednesday->save();

        $thursday_1=$request->input('thursday_1');
        $thursday_2=$request->input('thursday_2');
        $thursday_3=$request->input('thursday_3');
        $thursday_4=$request->input('thursday_4');
        $thursday_5=$request->input('thursday_5');
        $thursday_6=$request->input('thursday_6');
        $thursday_7=$request->input('thursday_7');

        $thursday= Shedule::where('teacher_id',$teacher->id)->where('day_of_week_id',4)->first();
        $thursday->lesson_1=$thursday_1;
        $thursday->lesson_2=$thursday_2;
        $thursday->lesson_3=$thursday_3;
        $thursday->lesson_4=$thursday_4;
        $thursday->lesson_5=$thursday_5;
        $thursday->lesson_6=$thursday_6;
        $thursday->lesson_7=$thursday_7;
        $thursday->day_of_week_id=$thursday_id->id;
        $thursday->teacher_id=$teacher->id;
        $thursday->save();

        $friday_1=$request->input('friday_1');
        $friday_2=$request->input('friday_2');
        $friday_3=$request->input('friday_3');
        $friday_4=$request->input('friday_4');
        $friday_5=$request->input('friday_5');
        $friday_6=$request->input('friday_6');
        $friday_7=$request->input('friday_7');

        $friday= Shedule::where('teacher_id',$teacher->id)->where('day_of_week_id',5)->first();
        $friday->lesson_1=$friday_1;
        $friday->lesson_2=$friday_2;
        $friday->lesson_3=$friday_3;
        $friday->lesson_4=$friday_4;
        $friday->lesson_5=$friday_5;
        $friday->lesson_6=$friday_6;
        $friday->lesson_7=$friday_7;
        $friday->day_of_week_id=$friday_id->id;
        $friday->teacher_id=$teacher->id;
        $friday->save();

        return redirect()->back()->with('message','Teacher edited successfully! ');


    }

    public function EditTeacherIndex(Request $request){
        $id=$request->id;
        $teacher=Teacher::where('id',$request->id)->first();
        if($teacher){
            $disciplines=TeacherDiscipline::where('teacher_id',$teacher->id)->pluck('discipline_id')->toArray();
            $shedule_1=Shedule::where('day_of_week_id','1')->where('teacher_id',$teacher->id)->first();
            $shedule_2=Shedule::where('day_of_week_id','2')->where('teacher_id',$teacher->id)->first();
            $shedule_3=Shedule::where('day_of_week_id','3')->where('teacher_id',$teacher->id)->first();
            $shedule_4=Shedule::where('day_of_week_id','4')->where('teacher_id',$teacher->id)->first();
            $shedule_5=Shedule::where('day_of_week_id','5')->where('teacher_id',$teacher->id)->first();

            return view('admin.EditTeacher')->with('teacher',$teacher)->with('disciplines_teacher',$disciplines)
                ->with('shedule_1',$shedule_1)
                ->with('shedule_2',$shedule_2)
                ->with('shedule_3',$shedule_3)
                ->with('shedule_4',$shedule_4)
                ->with('shedule_5',$shedule_5);
        }
        else{
            return view('admin.EditTeacher');
        }
    }

    public function EditIndex(){
        $teachers=\App\Teacher::get();
        return view('admin.Edit-Index')->with('teachers',$teachers);
    }

    public function CreateEventIndex(){

        return view('admin.CreateEvent');
    }

    public function CreateEvent(){

    }

}

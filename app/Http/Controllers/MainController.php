<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\TeacherDiscipline;
use App\Shedule;
class MainController extends Controller
{
    public function __construct()
    {

    }

    public function teacherIndex(Request $request){
        $teacher=Teacher::where('id',$request->id)->first();
        if($teacher){
            $teacher_discipline=TeacherDiscipline::where('teacher_id',$teacher->id)->get();
            $shedule=[];
            $shedule[1]=Shedule::where('day_of_week_id',1)->where('teacher_id',$teacher->id)->first();
            $shedule[2]=Shedule::where('day_of_week_id',2)->where('teacher_id',$teacher->id)->first();
            $shedule[3]=Shedule::where('day_of_week_id',3)->where('teacher_id',$teacher->id)->first();
            $shedule[4]=Shedule::where('day_of_week_id',4)->where('teacher_id',$teacher->id)->first();
            $shedule[5]=Shedule::where('day_of_week_id',5)->where('teacher_id',$teacher->id)->first();
            return view('main.teacher')->with('teacher',$teacher)->with('disciplines',$teacher_discipline)->with('shedule',$shedule);
        }
        return view('main.teacher');
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\Event;
use Illuminate\Http\Request;
use App\Teacher;
use App\TeacherDiscipline;
use App\Shedule;
class MainController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $teachers=\App\Teacher::get();
        $news=Article::orderBy('id','desc')->take(2)->get();
        $events=Event::orderBy('id','desc')->take(4)->get();
        return view('welcome')->with('teachers',$teachers)
            ->with('news',$news)->with('events',$events)
            ;
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

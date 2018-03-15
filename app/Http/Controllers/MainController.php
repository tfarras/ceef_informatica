<?php

namespace App\Http\Controllers;

use App\Absolvent;
use App\Article;
use App\Course;
use App\Event;
use App\EventImage;
use App\PhotoProject;
use App\Plan;
use App\Project;
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

    public function PlansIndex(){
        $plans= Plan::orderBy('id','desc')->paginate(3);

        return view('main.plans')->with('plans',$plans);
    }

    public function planShow(Request $request){
        $plan=Plan::find($request->id);

        return view('main.plan')->with('plan',$plan);
    }

    public function eventsIndex(){
        $events = Event::orderBy('id','desc')->paginate(4);

        return view('main.events')->with('events',$events);
    }

    public function eventShow(Request $request){
        $event=Event::find($request->id);

        return view('main.event')->with('event',$event);
    }

    public function articleShow(Request $request){
        $article=Article::find($request->id);

        return view('main.article')->with('article',$article);
    }

    public function articlesIndex(){
        $articles= Article::orderBy('id','desc')->paginate(4);

        return view('main.articles')->with('articles',$articles);
    }

    public function coursesIndex(){
        $courses= Course::orderBy('id','desc')->paginate(4);

        return view('main.courses')->with('courses',$courses);
    }

    public function courseShow(Request $request){
        $course = Course::find($request->id);

        return view('main.course')->with('course',$course);
    }

    public function absolventIndex(){
        $absolvents=Absolvent::orderBy('id','desc')->get();

        $years=Absolvent::select('year')->distinct()->get();

        return view('main.absolvents')->with('absolvents',$absolvents)->with('years',$years);
    }

    public function projectsIndex(){
        $projects=Project::orderBy('id','desc')->get();

        return view('main.projects')->with('projects',$projects);
    }

    public function projectsGalleryIndex(){
        $photos=PhotoProject::orderBy('id','desc')->paginate(20);

        return view('main.projectsGallery')->with('photos',$photos);
    }
}

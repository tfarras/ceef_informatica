<?php

namespace App\Http\Controllers;

use App\Absolvent;
use App\Article;
use App\Course;
use App\Discipline;
use App\Image;
use App\PhotoProject;
use App\Plan;
use App\Project;
use Illuminate\Http\Request;
use App\Teacher;
use App\TeacherDiscipline;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articlesCount=Article::all()->count();
        $eventCount=Article::all()->count();
        $courseCount=Course::all()->count();
        $planCount=Plan::all()->count();
        $teachersCount=Teacher::all()->count();
        $absolventsCount=Absolvent::all()->count();
        $disciplinesCount=Discipline::all()->count();
        $imagesAdmin=Image::all()->count();
        $projectsCount=Project::all()->count();
        $imagesProjects=PhotoProject::all()->count();
        return view('home')
            ->with('articlesCount',$articlesCount)
            ->with('eventCount',$eventCount)
            ->with('courseCount',$courseCount)
            ->with('planCount',$planCount)
            ->with('teachersCount',$teachersCount)
            ->with('absolventsCount',$absolventsCount)
            ->with('disciplinesCount',$disciplinesCount)
            ->with('imagesAdmin',$imagesAdmin)
            ->with('imagesProjects',$imagesProjects)
            ->with('projectsCount',$projectsCount);
    }
}

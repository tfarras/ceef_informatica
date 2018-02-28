<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        $teacher=Teacher::where('id',$request->id)->first();
        if($teacher){
            $teacher_discipline=TeacherDiscipline::where('teacher_id',$teacher->id)->get();
            return view('home')->with('teacher',$teacher)->with('disciplines',$teacher_discipline);
        }
        return view('home');
    }
}

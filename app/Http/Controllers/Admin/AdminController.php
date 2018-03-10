<?php

namespace App\Http\Controllers\Admin;

use App\Absolvent;
use App\Article;
use App\Course;
use App\Event;
use App\EventImage;
use App\Image;
use App\PhotoProject;
use App\Plan;
use App\Project;
use App\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shedule;
use App\Teacher;
use App\TeacherDiscipline;
use App\DaysOfWeek;
use Illuminate\Http\Response;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Index(){

    }

    public function CreateTeacherIndex(){
        return view('admin_lte.CreateTeacher');
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

            return view('admin_lte.EditTeacher')->with('teacher',$teacher)->with('disciplines_teacher',$disciplines)
                ->with('shedule_1',$shedule_1)
                ->with('shedule_2',$shedule_2)
                ->with('shedule_3',$shedule_3)
                ->with('shedule_4',$shedule_4)
                ->with('shedule_5',$shedule_5);
        }
        else{
            return view('admin_lte.EditTeacher');
        }
    }

    public function EditIndex(){
        $teachers=\App\Teacher::get();
        return view('admin_lte.Edit-Index')->with('teachers',$teachers);
    }

    public function CreateEventIndex(){

        return view('admin_lte.CreateEvent');
    }

    public function CreateEvent(Request $request){
        $title=$request->input('title');
        $description=$request->input('description');
        $datetime=$request->input('datetime');
        $image=$request->file('image');

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumirea!');
        }

        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descrierea!');
        }
        if(!$datetime){
            return redirect()->back()->with('error_message','Întroduceți data și timpul!');
        }
        if(!$image){
            return redirect()->back()->with('error_message','Alegeți imaginea!');
        }
        $datetime= Carbon::createFromFormat('d/m/Y H:i',$datetime);
        $datetime=$datetime->format('Y-m-d H:i');
        $extensions=['png','jpg','jpeg','gif'];
        if(!in_array($image->guessClientExtension(),$extensions)){
            return redirect()->back()->with('error_message','Extension of image is not supported !');
        }
        $imageName=date('m-d-Y_hia').uniqid().'.'.$image->guessClientExtension();
        $path=$image->storeAs('images/gallery',$imageName,'uploads');

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $event = new Event();
        $event->name=$title;
        $event->description=$description;
        $event->date=$datetime;
        $event->save();

        $eventImage= new EventImage();
        $eventImage->path=$path;
        $eventImage->event_id=$event->id;
        $eventImage->save();

        return redirect()->back()->with('message','Evenimentul a fost creat cu succes !');


    }

    public function GalleryUploadIndex(){

        return view('admin_lte.GalleryUploadIndex');
    }

    public function ImageUpload(Request $input){
        $files = $input->file('files');
        $json = array(
            'files' => array()
        );
        $extensions=['png','jpg','jpeg','gif'];
        foreach ($files as $file){
            $filename = $file->getClientOriginalName();
            if(!in_array($file->guessClientExtension(),$extensions)){
                $json['files'][] = array(
                    'name' => $filename,
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'error' => 'Extension of image is not supported !'
                );
            }else{
                $imageName=date('m-d-Y_hia').uniqid().'.'.$file->guessClientExtension();
                $path=$file->storeAs('images/gallery',$imageName,'uploads');
                $upload= new Image();
                $upload->path=$path;
                $upload->save();

                $json['files'][] = array(
                    'name' => $filename,
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'success' => 'Success !',
                );
            }

        }
        return \response()->json($json);
    }

    public function GalleryShow(){

        $images=Image::all();

        return view('admin_lte.GalleryView')->with('images',$images);

    }

    public function EventEdit(Request $request){
        $id=$request->input('id');
        $event=Event::where('id',$id)->first();

        if(!$event){
            return redirect()->route('AdminHome')->with('error_message','Evenimentul nu există');
        }

        return view('admin_lte.EditEvent')->with('event',$event);


    }

    public function EventSave(Request $request){
        $title=$request->input('title');
        $description=$request->input('description');
        $datetime=$request->input('datetime');
        $image=$request->file('image');
        $id=$request->input('id');

        $event=Event::where('id',$id)->first();

        if(!$event){
            return redirect()->back()->with('error_message','Fatal error. Event does not exists');
        }

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumirea!');
        }

        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descrierea!');
        }
        if(!$datetime){
            return redirect()->back()->with('error_message','Întroduceți data și timpul!');
        }
        $datetime= Carbon::createFromFormat('d/m/Y H:i',$datetime);

        $description= str_replace('<img','<img class="img-responsive"',$description);
        $datetime=$datetime->format('Y-m-d H:i');
        $event->name=$title;
        $event->description=$description;
        $event->date=$datetime;
        $event->save();

        if($image){
            $extensions=['png','jpg','jpeg','gif'];
            if(!in_array($image->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of image is not supported !');
            }
            $imageName=date('m-d-Y_hia').uniqid().'.'.$image->guessClientExtension();
            $path=$image->storeAs('images/gallery',$imageName,'uploads');

            $eventImage= EventImage::where('event_id',$event->id)->first();
            $eventImage->path=$path;
            $eventImage->event_id=$event->id;
            $eventImage->save();
        }

        return redirect()->back()->with('message','Evenimentul a fost redactat cu succes !');
    }

    public function AbsolventCreateIndex(){
        $year=date('Y-m-d');
        $start_date=date('Y-m-d',strtotime('-3 year',strtotime($year)));
        $start_date=Carbon::createFromFormat('Y-m-d',$start_date);
        $end_date=date('Y-m-d',strtotime('+1 year',strtotime($year)));
        $end_date=Carbon::createFromFormat('Y-m-d',$end_date);
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addYear()) {
            $dates[] = $date->format('Y');
        }

        return view('admin_lte.AbsolventCreateIndex')->with('dates',$dates);
    }

    public function AbsolventCreate(Request $request){
        $promotion=$request->input('promotion');
        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $image=$request->file('image');
        $company=$request->input('company');
        $group=$request->input('group');

        if(!$firstname){
            return redirect()->back()->with('error_message','Întroduceți prenume !');
        }
        if(!$promotion){
            return redirect()->back()->with('error_message','Întroduceți promoția !');
        }
        if(!$lastname){
            return redirect()->back()->with('error_message','Întroduceți nume !');
        }
        if(!$group){
            return redirect()->back()->with('error_message','Întroduceți grupa !');
        }
        if(!$image){
            return redirect()->back()->with('error_message','Allegeți fotografie !');
        }
            $extensions=['png','jpg','jpeg','gif'];
            if(!in_array($image->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of image is not supported !');
            }
            $imageName=date('m-d-Y_hia').uniqid().$firstname.'_'.$lastname.'.'.$image->guessClientExtension();
            $path=$image->storeAs('images/absolventi',$imageName,'uploads');


        $absolvent=new Absolvent();
        $absolvent->first_name=$firstname;
        $absolvent->last_name=$lastname;
        $absolvent->group=$group;
        $absolvent->work=$company;
        $absolvent->year=$promotion;
        $absolvent->photo_path=$path;
        $absolvent->save();

        return redirect()->back()->with('message','Absolvent a fost adaugat cu success !');

    }

    public function AbsolventEdit(Request $request){
        $id=$request->input('id');
        $absolvent=Absolvent::where('id',$id)->first();
        $year=date('Y-m-d');
        $start_date=date('Y-m-d',strtotime('-3 year',strtotime($year)));
        $start_date=Carbon::createFromFormat('Y-m-d',$start_date);
        $end_date=date('Y-m-d',strtotime('+1 year',strtotime($year)));
        $end_date=Carbon::createFromFormat('Y-m-d',$end_date);
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addYear()) {
            $dates[] = $date->format('Y');
        }
        return view('admin_lte.AbsolventEdit')->with('absolvent',$absolvent)->with('dates',$dates);

    }

    public function AbsolventSave(Request $request){
        $promotion=$request->input('promotion');
        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $image=$request->file('image');
        $company=$request->input('company');
        $group=$request->input('group');
        $id=$request->input('id');

        $absolvent=Absolvent::where('id',$id)->first();

        if(!$absolvent){
            return redirect()->back()->with('error_message','Absolventul nu exista !');
        }

        if(!$firstname){
            return redirect()->back()->with('error_message','Întroduceți prenume !');
        }
        if(!$promotion){
            return redirect()->back()->with('error_message','Întroduceți promoția !');
        }
        if(!$lastname){
            return redirect()->back()->with('error_message','Întroduceți nume !');
        }
        if(!$group){
            return redirect()->back()->with('error_message','Întroduceți grupa !');
        }

        $absolvent->first_name=$firstname;
        $absolvent->last_name=$lastname;
        $absolvent->group=$group;
        $absolvent->work=$company;
        $absolvent->year=$promotion;


        if($image){
            $extensions=['png','jpg','jpeg','gif'];
            if(!in_array($image->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of image is not supported !');
            }
            $imageName=date('m-d-Y_hia').uniqid().'.'.$image->guessClientExtension();
            $path=$image->storeAs('images/gallery',$imageName,'uploads');
            $absolvent->photo_path=$path;
        }

        $absolvent->save();

        return redirect()->back()->with('message','Absolventul a fost editat cu succes !');

    }

    public function DeleteAllIndex(){
        $events=Event::all();
        $teachers=Teacher::all();
        $absolvents=Absolvent::all();
        $articles=Article::all();
        $courses=Course::all();
        $plans=Plan::all();
        $projects=Project::all();
        return view('admin_lte.delete-all')
            ->with('events',$events)
            ->with('teachers',$teachers)
            ->with('absolvents',$absolvents)
            ->with('articles',$articles)
            ->with('courses',$courses)
            ->with('plans',$plans)
            ->with('projects', $projects);
    }

    public function deleteTeacher(Request $request){
            try{
                Teacher::destroy($request->input('id'));
            }
            catch (Exception $exception){
                return redirect()->back()->with('error_message','Error: '.$exception);
            }

            return redirect()->back()->with('message','Profesorul a fost șters cu succes !');
    }
    public function deleteAbsolvent(Request $request){
        try{
            Absolvent::destroy($request->input('id'));
        }
        catch (Exception $exception){
            return redirect()->back()->with('error_message','Error: '.$exception);
        }

        return redirect()->back()->with('message','Absolvent a fost șters cu succes !');
    }
    public function deleteEvent(Request $request){
        try{
            Event::destroy($request->input('id'));
        }
        catch (Exception $exception){
            return redirect()->back()->with('error_message','Error: '.$exception);
        }

        return redirect()->back()->with('message','Eveniment a fost șters cu succes !');
    }
    public function deleteArticle(Request $request){
        try{
            Article::destroy($request->input('id'));
        }
        catch (Exception $exception){
            return redirect()->back()->with('error_message','Error: '.$exception);
        }

        return redirect()->back()->with('message','Articol a fost șters cu succes !');
    }

    public function createArticle(){
        return view('admin_lte.article-create');
    }

    public function createArticleSave(Request $request){
        $title= $request->input('title');
        $description= $request->input('description');

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumire !');
        }
        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descriere !');
        }

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $article= new Article();
        $article->title=$title;
        $article->description=$description;
        $article->save();

        return redirect()->back()->with('message','Articolul a fost publicat !');

    }

    public function editArticleIndex(Request $request){
        $article=Article::find($request->id);

        return view('admin_lte.article-edit')->with('article',$article);
    }

    public function articleSave(Request $request){
        $title= $request->input('title');
        $description= $request->input('description');

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumire !');
        }
        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descriere !');
        }

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $article= Article::find($request->id);
        $article->title=$title;
        $article->description=$description;
        $article->save();

        return redirect()->back()->with('message','Articolul a fost salvat !');
    }

    public  function  createCourseIndex(){
        return view('admin_lte.course-create');
    }

    public  function createCourseSave(Request $request){
        $title= $request->input('title');
        $description= $request->input('description');

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumire !');
        }
        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descriere !');
        }

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $course=new Course();
        $course->title=$title;
        $course->description=$description;
        $course->save();

        return redirect()->back()->with('message','Course a fost publicat !');
    }

    public function editCourseIndex(Request $request){
        $course=Course::find($request->input('id'));

        return view('admin_lte.course-edit')->with('course',$course);
    }

    public function editCourseSave(Request $request){
        $title= $request->input('title');
        $description= $request->input('description');

        if(!$title){
            return redirect()->back()->with('error_message','Întroduceți denumire !');
        }
        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descriere !');
        }

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $article= Course::find($request->id);
        $article->title=$title;
        $article->description=$description;
        $article->save();

        return redirect()->back()->with('message','Curs a fost salvat !');
    }

    public function deleteCourse(Request $request){
        try{
            Course::destroy($request->input('id'));
        }
        catch (Exception $exception){
            return redirect()->back()->with('error_message','Error: '.$exception);
        }

        return redirect()->back()->with('message','Curs a fost șters cu succes !');
    }

    //TODO PLANURI DE INVATAMINT

    public function addPlanIndex(){
        $year=date('Y-m-d');
        $start_date=date('Y-m-d',strtotime('-3 year',strtotime($year)));
        $start_date=Carbon::createFromFormat('Y-m-d',$start_date);
        $end_date=date('Y-m-d',strtotime('+1 year',strtotime($year)));
        $end_date=Carbon::createFromFormat('Y-m-d',$end_date);
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addYear()) {
            $dates[] = $date->format('Y');
        }
        return view('admin_lte.CreatePlan')->with('dates',$dates);
    }

    public function addPlan(Request $request){
        $year=$request->input('year');
        $title=$request->input('title');
        $file=$request->file('file');

        if(!$year){
            return redirect()->back()->with('error_message','Alegeți anul !');
        }
        if(!$title){
            return redirect()->back()->with('error_message','Alegeți denumirea !');
        }
        if(!$file){
            return redirect()->back()->with('error_message','Alegeți file !');
        }

        $extensions=['pdf'];
        if(!in_array($file->guessClientExtension(),$extensions)){
            return redirect()->back()->with('error_message','Extension of file is not supported !');
        }
        $imageName=date('m-d-Y_hia').uniqid().'.'.$file->guessClientExtension();
        $path=$file->storeAs('files/plans',$imageName,'uploads');

        $plan= new Plan();
        $plan->name=$title;
        $plan->year=$year;
        $plan->path_to_file=$path;
        $plan->save();

        return redirect()->back()->with('message','Plan a fost salvat cu succes !');


    }

    public function editPlanIndex(Request $request){
        $plan=Plan::find($request->input('id'));
        $year=date('Y-m-d');
        $start_date=date('Y-m-d',strtotime('-3 year',strtotime($year)));
        $start_date=Carbon::createFromFormat('Y-m-d',$start_date);
        $end_date=date('Y-m-d',strtotime('+1 year',strtotime($year)));
        $end_date=Carbon::createFromFormat('Y-m-d',$end_date);
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addYear()) {
            $dates[] = $date->format('Y');
        }
        return view('admin_lte.EditPlan')->with('plan',$plan)->with('dates',$dates);

    }

    public function editPlan(Request $request){
        $year=$request->input('year');
        $title=$request->input('title');
        $file=$request->file('file');
        if(!$year){
            return redirect()->back()->with('error_message','Alegeți anul !');
        }
        if(!$title){
            return redirect()->back()->with('error_message','Alegeți denumirea !');
        }

        $plan=Plan::find($request->input('id'));
        $plan->name=$title;
        $plan->year=$year;
        if($file){
            $extensions=['pdf'];
            if(!in_array($file->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of file is not supported !');
            }
            $imageName=date('m-d-Y_hia').uniqid().'.'.$file->guessClientExtension();
            $path=$file->storeAs('files/plans',$imageName,'uploads');
            unlink($plan->path_to_file);
            $plan->path_to_file=$path;
        }

        $plan->save();

        return redirect()->back()->with('message','Plan a fost editat cu succes !');

    }

    public function deletePlan(Request $request){
        $plan=Plan::find($request->input('id'));
        unlink($plan->path_to_file);
        Plan::destroy($request->input('id'
        ));

        return redirect()->back()->with('message','Plan a fost sters cu succes !');
    }

    //TODO PROIECTE


    public function addProjectIndex(){
        return view('admin_lte.createProject');
    }

    public function addProject(Request $request){
        $name=$request->input('title');
        $description=$request->input('description');
        $student=$request->input('student');
        $image=$request->file('image');

        if(!$name){
            return redirect()->back()->with('error_message','Întroduceți denumirea!');
        }

        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descrierea!');
        }
        if(!$image){
            return redirect()->back()->with('error_message','Alegeți imaginea!');
        }
        $extensions=['png','jpg','jpeg','gif'];
        if(!in_array($image->guessClientExtension(),$extensions)){
            return redirect()->back()->with('error_message','Extension of image is not supported !');
        }
        $imageName=date('m-d-Y_hia').uniqid().'.'.$image->guessClientExtension();
        $path=$image->storeAs('images/projects',$imageName,'uploads');

        $description= str_replace('<img','<img class="img-responsive"',$description);

        $project= new Project();
        $project->name=$name;
        $project->description=$description;
        $project->student=$student;
        $project->logo=$path;
        $project->save();

        return redirect()->back()->with('message','Lucrarea a fost salvata cu succes !');
    }

    public function editProjectIndex(Request $request){
        $project=Project::find($request->input('id'));

        return view('admin_lte.editProject')->with('project',$project);

    }

    public function editProject(Request $request){
        $name=$request->input('title');
        $description=$request->input('description');
        $student=$request->input('student');
        $image=$request->file('image');

        if(!$name){
            return redirect()->back()->with('error_message','Întroduceți denumirea!');
        }

        if(!$description){
            return redirect()->back()->with('error_message','Întroduceți descrierea!');
        }
        $project=Project::find($request->input('id'));
        $project->name=$name;
        $description= str_replace('<img','<img class="img-responsive"',$description);
        $project->description=$description;
        $project->student=$student;
        if($image){
            $extensions=['png','jpg','jpeg','gif'];
            if(!in_array($image->guessClientExtension(),$extensions)){
                return redirect()->back()->with('error_message','Extension of image is not supported !');
            }
            $imageName=date('m-d-Y_hia').uniqid().'.'.$image->guessClientExtension();
            $path=$image->storeAs('images/projects',$imageName,'uploads');
            unlink($project->logo);
            $project->logo=$path;
        }
        $project->save();

        return redirect()->back()->with('message','Lucrarea a fost salvata cu succes !');
    }

    public function deleteProject(Request $request){

        $project=Plan::find($request->input('id'));
        unlink($project->logo);
        Plan::destroy($request->input('id'));

        return redirect()->back()->with('message','Lucrare de diplomă a fost stearsă cu succes !');
    }

    //TODO Projects gallery

    public function ProjectGalleryUploadIndex(){

        return view('admin_lte.ProjectGalleryUploadIndex');
    }

    public function ProjectPhotoUpload(Request $input){
        $files = $input->file('files');
        $json = array(
            'files' => array()
        );
        $extensions=['png','jpg','jpeg','gif'];
        foreach ($files as $file){
            $filename = $file->getClientOriginalName();
            if(!in_array($file->guessClientExtension(),$extensions)){
                $json['files'][] = array(
                    'name' => $filename,
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'error' => 'Extension of image is not supported !'
                );
            }else{
                $imageName=date('m-d-Y_hia').uniqid().'.'.$file->guessClientExtension();
                $path=$file->storeAs('images/projects/gallery',$imageName,'uploads');
                $upload= new PhotoProject();
                $upload->path=$path;
                $upload->save();

                $json['files'][] = array(
                    'name' => $filename,
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'success' => 'Success !',
                );
            }

        }
        return \response()->json($json);
    }

    public function ProjectGalleryShow(){

        $images=PhotoProject::all();

        return view('admin_lte.ProjectGalleryView')->with('images',$images);

    }

    public function deletePhoto(Request $request){
        $path=$request->input('path');

        unlink($path);
        if(Image::where('path',$path)->first())
        Image::where('path',$path)->first()->delete();
        elseif(PhotoProject::where('path',$path)->first())
        PhotoProject::where('path',$path)->first()->delete();



        return redirect()->back()->with('message','Imaginea a fost stearsa !');
    }
    public function changeDataIndex(){
        $user=Auth::user();
        return view('auth.changeData')->with('user',$user);
    }

    public function changeData(Request $request){
        $user=User::find($request->input('id'));
        if(Hash::check($request->input('xpassword'),$user->password)){
            if(Hash::check($request->input('code'),$user->security)){
                $user->password=bcrypt($request->input('ypassword'));
                $user->security=bcrypt($request->input('newcode'));
                $user->save();
                Session::flush();
                return redirect(route('AdminHome'));
            }else{

                return redirect(route('AdminHome'))->with('error_message','Incorrect security code !');
            }
        }else{
            return redirect(route('AdminHome'))->with('error_message','Incorrect password');
        }
    }

}

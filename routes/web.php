<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','MainController@index')->name('siteIndex');

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

Route::get('home',function(){
    return redirect('/');
});

Route::get('/admin', 'HomeController@index')->name('AdminHome');
Route::get('/home', function (){
    return redirect('/admin');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/admin/create/teacher','Admin\AdminController@CreateTeacherIndex')->name('CreateTeacherIndex');
Route::post('/admin/create/teacher/done','Admin\AdminController@CreateTeacher')->name('CreateTeacher');
Route::get('/admin/edit/teachers','Admin\AdminController@EditIndex')->name('EditIndex');
Route::get('/admin/edit/teacher/{id}','Admin\AdminController@EditTeacherIndex')->name('EditTeacherIndex');
Route::post('/admin/teacher/edit/done','Admin\AdminController@EditTeacher')->name('EditTeacher');

Route::get('/teacher/{id}/show','MainController@teacherIndex')->name('teacher.show');

Route::get('/admin/create/event','Admin\AdminController@CreateEventIndex')->name('CreateEventIndex');
Route::post('/admin/create/event/done','Admin\AdminController@CreateEvent')->name('CreateEvent');
Route::get('/admin/test',function(){
    return view('auth.login2');
});

Route::get('admin/gallery/upload','Admin\AdminController@GalleryUploadIndex')->name('GalleryUploadIndex');
Route::get('admin/gallery/view','Admin\AdminController@GalleryShow')->name('GalleryShow');

Route::post('admin/gallery/upload/done','Admin\AdminController@ImageUpload')->name('ImageUpload');
Route::get('admin/edit/event','Admin\AdminController@EventEdit')->name('EditEvent');

Route::post('admin/edit/event/save','Admin\AdminController@EventSave')->name('EventSave');

Route::get('admin/create/absolvent/index','Admin\AdminController@AbsolventCreateIndex')->name('AbsolventCreateIndex');
Route::post('admin/create/absolvent/done','Admin\AdminController@AbsolventCreate')->name('AbsolventCreate');
Route::get('admin/edit/absolvent','Admin\AdminController@AbsolventEdit')->name('AbsolventEdit');
Route::post('admin/edit/absolvent/save','Admin\AdminController@AbsolventSave')->name('AbsolventSave');

//Delete
Route::get('admin/delete/index','Admin\AdminController@DeleteAllIndex')->name('DeleteAll');
Route::post('admin/delete/teacher','Admin\AdminController@deleteTeacher')->name('DeleteTeacher');
Route::post('admin/delete/event','Admin\AdminController@deleteEvent')->name('DeleteEvent');
Route::post('admin/delete/absolvent','Admin\AdminController@deleteAbsolvent')->name('DeleteAbsolvent');
Route::post('admin/delete/article','Admin\AdminController@deleteArticle')->name('DeleteArticle');

//TODO Article
Route::get('admin/create/article','Admin\AdminController@createArticle')->name('CreateArticle');
Route::post('admin/create/article/save','Admin\AdminController@createArticleSave')->name('CreateArticleSave');
Route::get('admin/edit/article','Admin\AdminController@editArticleIndex')->name('editArticle');
Route::post('admin/edit/article/save','Admin\AdminController@articleSave')->name('ArticleSave');

//TODO Course

Route::get('admin/create/course','Admin\AdminController@createCourseIndex')->name('CreateCourse');
Route::post('admin/create/course/save','Admin\AdminController@createCourseSave')->name('CreateCourseSave');
Route::get('admin/edit/course','Admin\AdminController@editCourseIndex')->name('editCourse');
Route::post('admin/edit/course/save','Admin\AdminController@editcourseSave')->name('CourseSave');
Route::post('admin/delete/course','Admin\AdminController@deleteCourse')->name('CourseDelete');

//TODO PLAN
Route::get('admin/create/plan','Admin\AdminController@addPlanIndex')->name('CreatePlan');
Route::post('admin/create/plan/save','Admin\AdminController@addPlan')->name('CreatePlanSave');
Route::get('admin/edit/plan','Admin\AdminController@editPlanIndex')->name('editPlan');
Route::post('admin/edit/plan/save','Admin\AdminController@editPlan')->name('planSave');
Route::post('admin/delete/plan','Admin\AdminController@deletePlan')->name('planDelete');

//TODO Project
Route::get('admin/create/project','Admin\AdminController@addProjectIndex')->name('CreateProject');
Route::post('admin/create/project/save','Admin\AdminController@addProject')->name('CreateProjectSave');
Route::get('admin/edit/project','Admin\AdminController@editProjectIndex')->name('editProject');
Route::post('admin/edit/project/save','Admin\AdminController@editProject')->name('projectSave');
Route::post('admin/delete/project','Admin\AdminController@deleteProject')->name('projectDelete');

//TODO Project Gallery

Route::get('admin/projects/gallery/upload','Admin\AdminController@ProjectGalleryUploadIndex')->name('ProjectGalleryUploadIndex');
Route::get('admin/projects/gallery/view','Admin\AdminController@ProjectGalleryShow')->name('ProjectGalleryShow');

Route::post('admin/projects/gallery/upload/done','Admin\AdminController@ProjectPhotoUpload')->name('ProjectImageUpload');

Route::post('admin/delete/photo','Admin\AdminController@deletePhoto')->name('deletePhoto');

//TODO Change password

Route::get('admin/change/data','Admin\AdminController@changeDataIndex')->name('changeData');
Route::post('admin/change/data/save','Admin\AdminController@changeData')->name('saveData');
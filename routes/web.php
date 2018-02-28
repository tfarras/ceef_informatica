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

Route::get('/', function () {
    $teachers=\App\Teacher::get();
    return view('welcome')->with('teachers',$teachers);
});

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

Route::get('/admin', 'HomeController@index');
Route::get('/home', function (){
    return redirect('/admin');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/admin/create/teacher','Admin\AdminController@CreateTeacherIndex')->name('CreateTeacherIndex');
Route::post('/admin/create/teacher/done','Admin\AdminController@CreateTeacher')->name('CreateTeacher');
Route::get('/admin/teacher','Admin\AdminController@EditIndex')->name('EditIndex');
Route::get('/admin/teacher/{id}/edit','Admin\AdminController@EditTeacherIndex')->name('EditTeacherIndex');
Route::post('/admin/teacher/edit/done','Admin\AdminController@EditTeacher')->name('EditTeacher');

Route::get('/teacher/{id}/show','MainController@teacherIndex')->name('teacher.show');

Route::get('/admin/create/event','Admin\AdminController@CreateEventIndex')->name('CreateEventIndex');
Route::post('/admin/create/event/done','Admin\AdminController@CreateEvent')->name('CreateEvent');

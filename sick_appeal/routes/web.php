<?php

use App\Http\Controllers\Student_Controller;
use App\Http\Controllers\Lecture_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login',[Main_Controller::class,'login_View']) -> name('Login');
Route::get('/Register',[Main_Controller::class,'register_View']) -> name('Register');


Route::get('/Student/Dashboard',[Student_Controller::class,'dashboard']) -> name('Student_Dashboard');
Route::get('/Student/Create-Application',[Student_Controller::class,'application']) -> name('Student_Application');
Route::get('/Student/History',[Student_Controller::class,'history']) -> name('Student_History');
Route::get('/Student/Profile',[Student_Controller::class,'profile']) -> name('Student_Profile');
Route::get('/Student/Signout',[Student_Controller::class,'signout']) -> name('Student_Signout');






Route::get('/Lecture/Dashboard',[Lecture_Controller::class,'dashboard']) -> name('Lecture_Dashboard');


Route::get('/Lecture/Profile',[Lecture_Controller::class,'profile']) -> name('Lecture_Profile');
Route::get('/Lecture/Signout',[Lecture_Controller::class,'signout']) -> name('Lecture_Signout');
Route::get('/Lecture/History',[Lecture_Controller::class,'history']) -> name('Lecture_History');
Route::get('/Lecture/Applications/New',[Lecture_Controller::class,'applications']) -> name('Lecture_Applications');
Route::get('/Lecture/Applications/New/ID',[Lecture_Controller::class,'application_view']) -> name('Application_View');

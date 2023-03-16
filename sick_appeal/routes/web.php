<?php

use App\Http\Controllers\Student_Controller;
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

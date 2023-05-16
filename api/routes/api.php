<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SickTestController;
use App\Http\Controllers\StudentApplicationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
Route::apiResource('accounts', AccountController::class);
Route::apiResource('lecturers', LecturerController::class);
Route::apiResource('students', StudentController::class);

//Academic
Route::apiResource('course-modules', CourseModuleController::class);
Route::apiResource('applications', ApplicationController::class);
Route::apiResource('sick-tests', SickTestController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('modules', ModuleController::class);
Route::apiResource('tests', TestController::class);

//Authentication
Route::post('login', [Login::class, 'login']);
Route::post('email-verification', [AccountController::class, 'verify']);

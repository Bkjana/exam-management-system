<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[UserController::class,'login']);
Route::post('/',[UserController::class,'loginCheck']);
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'registerSave']);



Route::group(['prefix'=>'admin','middleware'=>['admin']],function () {
    Route::get("/",[AdminController::class,'index']);
    Route::get('/logout',[AdminController::class,'logout']);
    Route::get('/student',[AdminController::class,'studentView']);
    Route::get('/teacher',[AdminController::class,'teacherView']);
    Route::get('/subject',[AdminController::class,'subjectView']);
    Route::get('/exam',[AdminController::class,'examView']);
    
});


Route::group(['prefix'=>'teacher','middleware'=>['teacher']],function () {
    Route::get("/",[TeacherController::class,'index']);
    Route::get('/logout',[TeacherController::class,'logout']);
    
});


Route::group(['prefix'=>'student','middleware'=>['student']],function () {
    Route::get("/",[StudentController::class,'index']);
    Route::get('/logout',[StudentController::class,'logout']);
    
});

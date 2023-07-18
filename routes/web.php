<?php

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
    Route::view("/","admin.index");
});


Route::group(['prefix'=>'teacher','middleware'=>['teacher']],function () {
    Route::view("/","teacher.index");
    
});


Route::group(['prefix'=>'student','middleware'=>['student']],function () {
    Route::view("/","student.index");
    
});

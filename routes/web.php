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

Route::get('/',[UserController::class,'index']);
Route::get('/login',[UserController::class,'login']);
Route::post('/login',[UserController::class,'loginCheck']);
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'registerSave']);
Route::post('/contact',[UserController::class,'contact']);
Route::view('/studentQualification','studentQualification');
Route::post('/studentQualification',[UserController::class,'studentQualification']);



Route::get('/admin/login',[AdminController::class,'login']);
Route::view('/admin/teacher_table','admin.teacher_table');
Route::group(['prefix'=>'admin','middleware'=>['admin']],function () {


    Route::get("/",[AdminController::class,'index']);
    Route::get('/logout',[AdminController::class,'logout']);



    Route::prefix('/student')->group(function(){
        Route::get('/',[AdminController::class,'studentView']);
        Route::get('/past',[AdminController::class,'studentViewPast']);
        Route::get('/restore/{id}',[AdminController::class,'studentRestore']);
        Route::get('/permanentdelete/{id}',[AdminController::class,'studentPermanentDelete']);
        Route::get('/delete/{id}',[AdminController::class,'studentDelete']);
        Route::get('/studentSortAscending',[AdminController::class,'studentSortAscending']);
        Route::get('/studentSortDescending',[AdminController::class,'studentSortDescending']);
        Route::get('/studentSearch/{search}',[AdminController::class,'studentSearch']);
    });


    Route::prefix("/subject")->group(function() {
        Route::get('/',[AdminController::class,'subjectView']);
        Route::get('/add',[AdminController::class,'subjectAdd']);
        Route::post('/add',[AdminController::class,'subjectSave']);
        Route::get('/edit/{id}',[AdminController::class,'subjectEdit']);
        Route::post('/edit',[AdminController::class,'subjectEditSave']);
        Route::get('/delete/{id}',[AdminController::class,'subjectDelete']);
    });


    Route::prefix("/exam")->group(function() {
        Route::get('/',[AdminController::class,'examView']);
        Route::get('/add',[AdminController::class,'examAdd']);
        Route::post('/add',[AdminController::class,'examSave']);
        Route::get('/edit/{id}',[AdminController::class,'examEdit']);
        Route::post('/edit',[AdminController::class,'examEditSave']);
        Route::get('/delete/{id}',[AdminController::class,'examDelete']);
    });

    Route::prefix("/teacher")->group(function() {
        Route::get('/',[AdminController::class,'teacherView']);
        Route::get('/past',[AdminController::class,'teacherViewPast']);
        Route::get('/restore/{id}',[AdminController::class,'teacherRestore']);
        Route::get('/permanentdelete/{id}',[AdminController::class,'teacherPermanentDelete']);
        Route::get('/delete/{id}',[AdminController::class,'teacherDelete']);
        // Route::get('/unverified',[AdminController::class,'teacherUnverified']);
        Route::get('/accept/{id}',[AdminController::class,'teacherAccept']);
        Route::get('/sort/{val}',[AdminController::class,'teacherSort']);
        Route::get('/approved',[AdminController::class,'teacherApproved']);
        Route::get('/disapproved',[AdminController::class,'teacherUnverified']);
        Route::get('/teacherSearch/{val}',[AdminController::class,'teacherSearch']);
        // Route::get('/teacher_table',[AdminController::class,'teacherTableBody']);
    });


    
});


Route::get('/teacher/register',[TeacherController::class,'register']);
Route::group(['prefix'=>'teacher','middleware'=>['teacher']],function () {
    Route::get("/",[TeacherController::class,'index']);
    Route::get('/logout',[TeacherController::class,'logout']);
    Route::get('/exam',[TeacherController::class,'examView']);
    Route::post('/exam',[TeacherController::class,'examSave']);
    Route::get('/subject',[TeacherController::class,'subject']);
    Route::get('/viewAnswershet/{exam_id}',[TeacherController::class,'viewAnswershet']);
});


Route::get('/student/register',[StudentController::class,'resgister']);
Route::group(['prefix'=>'student','middleware'=>['student']],function () {
    Route::get("/",[StudentController::class,'index']);
    Route::get('/logout',[StudentController::class,'logout']);
    Route::get('/subject',[StudentController::class,'subject']);
    Route::get('/exam',[StudentController::class,'exam']);
    Route::post('/saveAnswerPaper',[StudentController::class,'saveAnswerPaper']);
    Route::get('/enrolledSubject/{id}',[StudentController::class,'enrolledSubject']);
    Route::get('/enrolledExam/{id}',[StudentController::class,'enrolledExam']);
});

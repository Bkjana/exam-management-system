<?php

use App\Http\Controllers\UserController;

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


Route::prefix('student')->group(function () {
    Route::view("/","student.index");
});


Route::prefix('teacher')->group(function () {
    Route::view("/","teacher.index");
    
});


Route::prefix('admin')->group(function () {
    Route::view("/","admin.index");
    
});

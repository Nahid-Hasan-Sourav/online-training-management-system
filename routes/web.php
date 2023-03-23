<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use \App\Http\Controllers\TeacherAuthController;
use  \App\Http\Controllers\TrainingController;
use \App\Http\Controllers\CategoryCotroller;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/training-category',[HomeController::class,'trainingCategory'])->name('training-category');
Route::get('/all-training',[HomeController::class,'allTraining'])->name('all-training');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/login-registration',[HomeController::class,'auth'])->name('login-registration');


Route::get('/teacher/login',[TeacherAuthController::class,'index'])->name('teacher.login');
Route::post('/teacher/login',[TeacherAuthController::class,'login'])->name('teacher.login');

Route::middleware(['teacher.auth'])->group(function (){
    Route::get('/teacher/dashboard',[TeacherAuthController::class,'dashboard'])->name('teacher.dashboard');
    Route::post('/teacher/logout',[TeacherAuthController::class,'logout'])->name('teacher.logout');

    Route::get('/training/add',[TrainingController::class,'index'])->name('training.add');
    Route::post('/training/create',[TrainingController::class,'create'])->name('training.create');
    Route::get('/training/manage',[TrainingController::class,'manage'])->name('training.manage');
    Route::get('/training/edit/{id}',[TrainingController::class,'edit'])->name('training.edit');
    Route::post('/training/update/{id}',[TrainingController::class,'update'])->name('training.update');
    Route::get('/training/delete/{id}',[TrainingController::class,'delete'])->name('training.delete');
});





//this is for admin middle ware
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/teacher/add',[TeacherController::class,'index'])->name('teacher.add');
    Route::get('/teacher/manage',[TeacherController::class,'manage'])->name('teacher.manage');
    Route::post('/teacher/create',[TeacherController::class,'createTeacher'])->name('teacher.create');
    Route::get('/teacher/edit/{id}',[TeacherController::class,'editTeacher'])->name('teacher.edit');
    Route::post('/teacher/update/{id}',[TeacherController::class,'updateTeacher'])->name('teacher.update');
    Route::post('/teacher/delete/{id}',[TeacherController::class,'delete'])->name('teacher.delete');


    Route::get('/category/add',[CategoryCotroller::class,'index'])->name('category.add');
    Route::post('/category/create',[CategoryCotroller::class,'create'])->name('category.create');
    Route::get('/category/manage',[CategoryCotroller::class,'manage'])->name('manage.category');
    Route::get('/category/edit/{id}',[CategoryCotroller::class,'edit'])->name('edit.category');
});

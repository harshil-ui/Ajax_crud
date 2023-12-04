<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::view('/student-form', 'student.form')->name('student-form');

Route::post('/add-student', [StudentController::class, 'insert'])->name('add-student');

Route::get('/student-list', [StudentController::class, 'view'])->name('student-list');

Route::get('/', [StudentController::class, 'index'])->name('home');
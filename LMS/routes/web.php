<?php

use App\Http\Controllers\attendanceController;
use App\Http\Controllers\profileCard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\examsController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\datesAdminController;
use App\Http\Controllers\gradesAdminController;
use App\Http\Controllers\profileCardController;

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

Route::redirect('/', '/home', 301);

//Route::view('/home', 'layouts.index')->name('home')->middleware('auth');
Route::get('/home', [indexController::class, 'index'])->name('home')->middleware('auth');

Route::view('/register', 'layouts.register')->name('register')->middleware('guest');
Route::post('/register', [registerController::class, 'post'])->middleware('guest');

Route::view('/login', 'layouts.login')->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'post'])->middleware('guest');

Route::post('/logout', [logoutController::class, 'post'])->name('logout')->middleware('auth');

Route::name('user.')->group(function () {
    Route::get('/users/courses', [coursesController::class, 'index'])->name('courses')->middleware('auth');

    Route::get('/users/grades', [gradesController::class, 'index'])->name('grades')->middleware('auth');

    Route::get('/users/exams', [examsController::class, 'index'])->name('exams')->middleware('auth');

    Route::get('/users/attendance', [attendanceController::class, 'index'])->name('attendance')->middleware('auth');

    Route::get('/users/{user:name}', [profileCardController::class, 'index'])->name('profile')->middleware('auth', 'profile');

    Route::post('/users/{user:name}', [profileCardController::class, 'upload'])->middleware('auth', 'profile');
});

Route::name('admin.')->group(function () {
    Route::get('/admins/users', [gradesAdminController::class, 'index'])->name('grades')->middleware('auth', 'admin');

    Route::post('/admins/users', [gradesAdminController::class, 'store'])->middleware('auth', 'admin');

    Route::put('/admins/users', [gradesAdminController::class, 'update'])->middleware('auth', 'admin');

    Route::delete('/admins/users', [gradesAdminController::class, 'delete'])->middleware('auth', 'admin');

    Route::get('/admins/dates', [datesAdminController::class, 'index'])->name('dates')->middleware('auth', 'admin');

    Route::post('/admins/dates', [datesAdminController::class, 'store'])->middleware('auth', 'admin');

    Route::delete('/admins/dates', [datesAdminController::class, 'delete'])->middleware('auth', 'admin');

    Route::put('/admins/dates', [datesAdminController::class, 'update'])->middleware('auth', 'admin');
    /*
    Route::delete('/admins/grades/delete', [gradesAdminController::class, 'deleteGrade'])->middleware('auth', 'admin'); */
});

Route::fallback(function () {
    return view('errors.404');
});

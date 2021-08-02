<?php

use App\Http\Controllers\profileCard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\registerController;
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

    Route::get('/users/{user:name}', [profileCardController::class, 'index'])->name('profile')->middleware('auth', 'profile');
});

Route::name('admin.')->group(function () {
    Route::get('/admins/grades', [gradesAdminController::class, 'index'])->name('grades')->middleware('auth', 'admin');

    Route::post('/admins/grades', [gradesAdminController::class, 'store'])->middleware('auth', 'admin');

    Route::get('/admins/grades/delete', [gradesAdminController::class, 'formDelete'])->name('grades_delete')->middleware('auth', 'admin');

    Route::post('/admins/grades/delete', [gradesAdminController::class, 'showGrades'])->middleware('auth', 'admin');

    Route::delete('/admins/grades/delete', [gradesAdminController::class, 'deleteGrade'])->middleware('auth', 'admin');
});

Route::fallback(function () {
    return view('errors.404');
});

<?php

use App\Http\Controllers\profileCard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\examsController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\adminUsersController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\datesAdminController;
use App\Http\Controllers\adminCourseController;
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
    Route::get('/admins/users', [adminUsersController::class, 'index'])->name('users')->middleware('auth', 'admin'); // all users 

    Route::get('/admins/{user:name}/grades/{course}', [adminCourseController::class, 'enterGrade'])->name('grades')->middleware('auth', 'admin');  // form for posting grade

    Route::post('/admins/{user:name}/grades/{course}', [adminCourseController::class, 'postGrade'])->middleware('auth', 'admin');

    Route::get('/admins/{course:name}', [adminCourseController::class, 'index'])->name('courses')->middleware('auth', 'admin'); //  all students specific for course

    Route::post('/admins/{course:name}', [adminCourseController::class, 'upload'])->name('exams')->middleware('auth', 'admin'); // form for posting exam date

    /*Route::get('admins/{user:name}/grades/{course}', function ($name, $test) {
        dd($test);
    }); */
});

Route::fallback(function () {
    return view('errors.404');
});

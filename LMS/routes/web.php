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
use App\Http\Controllers\finalGradeController;
use App\Http\Controllers\adminCourseController;
use App\Http\Controllers\gradesAdminController;
use App\Http\Controllers\profileCardController;
use App\Http\Controllers\adminAttendanceController;

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

    Route::get('/admins/{user:name}/enter_grades/{course}', [adminCourseController::class, 'enterGrade'])->name('enter_grades')->middleware('auth', 'admin');  // see form for posting grade

    Route::post('/admins/{user:name}/enter_grades/{course}', [adminCourseController::class, 'postGrade'])->middleware('auth', 'admin'); // posting the grade for student

    Route::get('/admins/{user:name}/edit_grades/{course}', [adminCourseController::class, 'editGrade'])->name('edit_grades')->middleware('auth', 'admin'); // see form for editing the grade

    Route::put('/admins/{user:name}/edit_grades/{course}', [adminCourseController::class, 'putGrade'])->middleware('auth', 'admin'); // editing the grade for student

    Route::get('/admins/{user:name}/delete_grades/{course}', [adminCourseController::class, 'deleteGrade'])->name('delete_grades')->middleware('auth', 'admin'); // see form for deleting the grade

    Route::delete('/admins/{user:name}/delete_grades/{course}', [adminCourseController::class, 'removeGrade'])->middleware('auth', 'admin'); // deleting the grade for student

    /////////

    Route::get('/admins/grades/{course:name}', [adminCourseController::class, 'index'])->name('courses')->middleware('auth', 'admin'); //  all students specific for course
    ///
    Route::get('/admins/attendance/{course:name}', [adminAttendanceController::class, 'index'])->name('attendance')->middleware('auth', 'admin'); //  all students specific for course

    Route::get('/admins/{user:name}/enter_att/{course}', [adminAttendanceController::class, 'enterAtt'])->name('enter_att')->middleware('auth', 'admin');  // see form for posting attendance

    Route::post('/admins/{user:name}/enter_att/{course}', [adminAttendanceController::class, 'postAtt'])->middleware('auth', 'admin');  // posting attendance for student

    Route::get('/admins/{user:name}/edit_att/{course}', [adminAttendanceController::class, 'editAtt'])->name('editAtt')->middleware('auth', 'admin');  // see form for editing attendance

    Route::put('/admins/{user:name}/edit_att/{course}', [adminAttendanceController::class, 'putAtt'])->middleware('auth', 'admin');  // updating attendace for student

    Route::get('/admins/{user:name}/delete_att/{course}', [adminAttendanceController::class, 'deleteAtt'])->name('deleteAtt')->middleware('auth', 'admin');  // see form for deleting attendance

    Route::delete('/admins/{user:name}/delete_att/{course}', [adminAttendanceController::class, 'removeAtt'])->middleware('auth', 'admin');  // deleting attendace for student

    //////////////

    Route::get('/admins/final/{course:name}', [finalGradeController::class, 'index'])->name('finals')->middleware('auth', 'admin'); //  all students specific for course

    Route::post('/admins/final/{course:name}', [finalGradeController::class, 'post'])->middleware('auth', 'admin'); //  conclude final grade



    //////
    Route::post('/admins/{course:name}', [adminCourseController::class, 'upload'])->name('exams')->middleware('auth', 'admin'); // form for posting exam date

    /*Route::get('admins/{user:name}/grades/{course}', function ($name, $test) {
        dd($test);
    }); */
});

Route::fallback(function () {
    return view('errors.404');
});

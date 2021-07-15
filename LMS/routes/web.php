<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\registerController;

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

Route::view('/home', 'layouts.index')->name('home')->middleware('auth');

Route::view('/register', 'layouts.register')->name('register')->middleware('guest');
Route::post('/register', [registerController::class, 'post'])->middleware('guest');;

Route::view('/login', 'layouts.login')->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'post'])->middleware('guest');;

Route::post('/logout', [logoutController::class, 'post'])->name('logout')->middleware('auth');

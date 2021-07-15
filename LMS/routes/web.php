<?php

use Illuminate\Support\Facades\Route;
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


Route::view('/', 'layouts.index')->name('home');;


Route::view('/register', 'layouts.register')->name('register');
Route::post('/register', [registerController::class, 'post']);

Route::view('/login', 'layouts.login')->name('login');
Route::post('/login', [loginController::class, 'post']);

Route::post('/logout', [logoutController::class, 'post'])->name('logout');

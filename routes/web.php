<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'index'])->name('user_show');

Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/login', [\App\Http\Controllers\AccountController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AccountController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\AccountController::class, 'register'])->name('register');
Route::post('/store', [\App\Http\Controllers\AccountController::class, 'store'])->name('store');
Route::get('/profile', [\App\Http\Controllers\AccountController::class, 'profile'])->name('profile');
Route::post('/update_profile/{user}', [\App\Http\Controllers\AccountController::class, 'update_profile'])->name('update_profile');
Route::get('/password', [\App\Http\Controllers\AccountController::class, 'password'])->name('password');
Route::post('/update_password', [\App\Http\Controllers\AccountController::class, 'update_password'])->name('update_password');
Route::post('/authenticate', [\App\Http\Controllers\AccountController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account', [\App\Http\Controllers\AccountController::class, 'myAccount'])->name('account.index');



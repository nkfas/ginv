<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgetController;


Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('index',[DashboardController::class,'index']);

Route::get('login',[LoginController::class,'login'])->name('login');;
Route::post('login', [LoginController::class, 'authenticate'])->name('login');


Route::get('admin',[AdminController::class,'index']);

Route::get('register',[RegisterController::class,'register']);
Route::post('register', [RegisterController::class, 'doregister'])->name('register');

Route::get('forget',[ForgetController::class,'forget'])->name('forget');
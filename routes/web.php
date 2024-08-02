<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index',[DashboardController::class,'index']);

Route::get('login',[LoginController::class,'login']);

Route::get('register',[RegisterController::class,'register']);

Route::get('admin',[AdminController::class,'index']);
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Master\Common\RegionController;
use App\Http\Controllers\Master\Common\CountryController;
use App\Http\Middleware\BasicAuth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');

Route::get('register',[RegisterController::class,'register']);
Route::post('register', [RegisterController::class, 'doregister'])->name('register');

Route::get('forget',[ForgetController::class,'forget'])->name('forget');

Route::middleware([BasicAuth::class])->group(function (){
    Route::get('/',[DashboardController::class,'index'])->name('home');
   Route::prefix('master')->group(function(){
    Route::controller(CountryController::class)->group(function () {
        Route::prefix('country')->group(function () {
             Route::get('/', 'list')->name('country');
             Route::get('/add', 'add')->name('add-country');
             Route::post('/add', 'save')->name('add-country');
             Route::get('edit/{id}', 'edit')->name('countries.edit');
             Route::put('edit/{id}','update')->name('countries.edit');
        });     
    });
    Route::controller(RegionController::class)->group(function () {
        Route::prefix('region')->group(function () {
             Route::get('/', 'list')->name('region');
             Route::get('/radd', 'add')->name('add-region');
             Route::post('/radd', 'save')->name('add-region');
             Route::get('redit/{id}', 'edit')->name('region.edit');
             Route::put('redit/{id}','update')->name('region.edit');
        });     
    });
   });
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');





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
   
    
    Route::get('country',[CountryController::class,'list'])->name(('country'));
    Route::get('add',[CountryController::class,'add'])->name(('addCountry'));
    Route::post('add',[CountryController::class,'save'])->name(('addCountry'));

    Route::get('edit_country{id}', [CountryController::class, 'edit'])->name('countries.edit');
    Route::put('edit_country{id}', [CountryController::class, 'update'])->name('countries.edit');

    Route::get('region',[RegionController::class,'list'])->name(('region'));
    Route::get('add',[RegionController::class,'add'])->name(('addRegion'));
    Route::post('add',[RegionController::class,'save'])->name(('addRegion'));

    Route::get('edit_region{id}', [RegionController::class, 'edit'])->name('region.edit');
    Route::post('edit_region{id}', [RegionController::class, 'update'])->name('region.edit');

});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');





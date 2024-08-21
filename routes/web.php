<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Master\Common\RegionController;
use App\Http\Controllers\Master\Common\CountryController;
use App\Http\Controllers\Master\CustomerController;
use App\Http\Middleware\BasicAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\StockController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Master\Common\VatController;


Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');

Route::get('register',[RegisterController::class,'register']);
Route::post('register', [RegisterController::class, 'doregister'])->name('register');

Route::get('forget',[ForgetController::class,'forget'])->name('forget');

Route::middleware([BasicAuth::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::prefix('master')->group(function () {
        Route::controller(CountryController::class)->group(function () {
            Route::prefix('country')->group(function () {
                Route::get('/', 'list')->name('country');
                Route::get('/add', 'add')->name('add-country');
                Route::post('/add', 'save')->name('add-country');
                Route::get('edit/{id}', 'edit')->name('countries.edit');
                Route::post('edit/{id}', 'update')->name('countries.edit');
            });
        });
        Route::controller(RegionController::class)->group(function () {
            Route::prefix('region')->group(function () {
                Route::get('/', 'list')->name('region');
                Route::get('/add', 'add')->name('add-region');
                Route::post('/add', 'save')->name('add-region');
                Route::get('edit/{id}', 'edit')->name('region.edit');
                Route::put('edit/{id}', 'update')->name('region.edit');
            });
        });
        Route::controller(CustomerController::class)->group(function () {
            Route::prefix('customer')->group(function () {
                Route::get('/', 'list')->name('customer');
                Route::get('/add', 'add')->name('add-customer');
            });
        });

        Route::controller(VatController::class)->group(function () {
            Route::prefix('vat')->group(function () {
                Route::get('/', 'list')->name('vat');
                 Route::get('/add', 'add')->name('add-vat');
                 Route::post('/add', 'save')->name('add-vat');
                 Route::get('edit/{id}', 'edit')->name('vat.edit');
                 Route::put('edit/{id}', 'update')->name('vat.edit');
                 Route::get('/vat/{id}', 'delete')->name('vat.delete');
            });
        });

        Route::controller(StockController::class)->group(function () {
            Route::prefix('stock')->group(function () {
                Route::get('/', 'list')->name('stock');
                 Route::get('/add', 'add')->name('add-stock');
                 Route::post('/add', 'save')->name('add-stock');
                 Route::get('edit/{id}', 'edit')->name('stock.edit');
                 Route::put('edit/{id}', 'update')->name('stock.edit');
                 Route::get('/stock/{id}','delete')->name('stock.delete');
                 Route::get('/view/{id}','showdelete')->name('stock.view');
            });
        });




    });
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');





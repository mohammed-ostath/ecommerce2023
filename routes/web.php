<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\Homecontroller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Costomer\CostomerController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Costomer\Dashboard\DashboardCostomerController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // Login
        Route::group(['namespace' => 'Auth'], function () {

            Route::get('/login/{type}', [LoginController::class,'loginForm'])->middleware('guest')->name('login.show');
            Route::post('/login', [LoginController::class,'login'])->name('login');
            Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');


        });

        Route::get('/selection',[HomeController::class,'selection'])->name('selection');


        Route::resource('/',Homecontroller::class)->name('index','home');

        Route::resource('/dashboard',DashboardController::class)->name('index','dashboard')->middleware(['auth','verified']);


        Route::resource('/costomer/dashboard',DashboardCostomerController::class)->name('index','/costomer/dashboard');


    });
require __DIR__.'/auth.php';

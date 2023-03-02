<?php

use App\Http\Controllers\Address\CitieController;
use App\Http\Controllers\Address\CountrieController;
use App\Http\Controllers\Address\StateController;
use App\Http\Controllers\Cart\OrderController;
use App\Http\Controllers\Categore\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Costomer\CostomerController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Costomer\Dashboard\DashboardController;
use App\Http\Controllers\Costomer\ProductController as CostomerProductController;
use App\Http\Controllers\Home\Homecontroller;
use App\Http\Controllers\Product\ProductController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::resource('/costomer',CostomerController::class);
        Route::resource('/categorie',CategorieController::class);
        Route::resource('/product',ProductController::class);
        Route::resource('/create/cart',CostomerProductController::class)->name('show','cart');
        Route::resource('/orders',OrderController::class);
        Route::resource('/countries',CountrieController::class);
        Route::resource('/cities',CitieController::class);
        Route::resource('/states',StateController::class);

    });

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Costomer\Cart\ShowOrderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Costomer\Dashboard\DashboardController;
use App\Http\Controllers\Costomer\Address\CostumerAddressController;
use App\Http\Controllers\Costomer\Payment\PaymentController;
use App\Http\Controllers\Costomer\Payment\StripeController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::resource('/showcart',ShowOrderController::class);
        Route::resource('/costomer_address',CostumerAddressController::class);
        Route::resource('/payment',PaymentController::class);
        Route::resource('/stripe',StripeController::class);
    });

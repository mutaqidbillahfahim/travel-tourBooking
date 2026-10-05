<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TravelerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ItineryController;

Route::prefix('v1')->group(function(){
    Route::apiResource('packages', PackageController::class);
});
Route::apiResource('travelers', TravelerController::class);
Route::apiResource("bookings", BookingController::class);
Route::apiResource("itineries",ItineryController::class);

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/ping', function () {
    return response()->json([
        'pong' => true,
        'time' => now()
    ]);
});

Route::get('/greet/{name}', [WelcomeController::class, 'greet']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TravelerController;

Route::get('/hello',[WelcomeController::class,'hello']);

Route::get('/ping', function () {
    return response()->json([
        'pong' => true,
        'time' => now()
    ]);
});

Route::get('/greet/{name}',[WelcomeController::class,'greet']);
Route::apiResource('traveler', TravelerController::class);
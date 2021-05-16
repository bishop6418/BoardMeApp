<?php

use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');
Route::post('register', 'UserController@store');

Route::middleware('auth:api')->group(function () {
    // API RESOURCE
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('rating', RatingController::class);
    Route::resource('boarding_houses', BoardingHouseController::class);
});

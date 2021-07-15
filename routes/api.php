<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

    Route::post('login', [UserController::class,'login']);
    Route::post('register', [UserController::class ,'register']);
    Route::post('patient_book', 'App\Http\Controllers\Api\BookingController@booking')->middleware('auth:api');
    Route::get('availabletime', 'App\Http\Controllers\Api\BookingController@availabletimeslots')->middleware('auth:api');



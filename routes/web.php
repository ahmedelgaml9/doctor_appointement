<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','App\Http\Controllers\UserController@registerdoctor');

Auth::routes();


Route::post('doctorstores','App\Http\Controllers\UserController@store')->name('doctorstore');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(array('middleware' =>   array('auth', 'doctor'), 'prefix' => 'doctors'), function() {

Route::get('/','App\Http\Controllers\DoctorslotController@profile');

Route::resource('slots','App\Http\Controllers\DoctorslotController');


});



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

Route::get('/', function () {
    return view('admin.auth.login');
})->middleware('guest');

Route::post('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@getRegister')->name('register');
Route::post('register', 'AuthController@postRegister')->name('post_register');




Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('change-password', 'AuthController@changePassword')->name('changePassword');
Route::post('update-user', 'AuthController@update')->name('user.update-user');

Route::get('top', 'TopController@index')->name('top');

Route::resource('user', 'UserController');
Route::resource('setting', 'SettingController');
Route::get('setting/{id}/update-active', 'SettingController@setActive')->name('setActive');

//user
Route::get('site', 'TopController@site')->name('top.site');
Route::get('total-keeping', 'TopController@totalTime')->name('top.total');

Route::get('check-in', 'TimekeepingController@checkIn')->name('checkIn');
Route::get('check-out', 'TimekeepingController@checkOut')->name('checkOut');

Route::get('getTimeKeeping/{id}', 'TimekeepingController@getTimeKeeping')->name('getTimeKeeping');
Route::get('getTotalTimeKeeping/{id}', 'TimekeepingController@getTotalKeeping')->name('getTotalKeeping');

// Route::group(['middleware' => 'guest'], function () {
// });

// Route::group(['namespace' => 'user', 'middleware' => 'check.role'], function () {

// });

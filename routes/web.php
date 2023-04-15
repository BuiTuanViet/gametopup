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



Route::get('login', 'AuthController@getLogin')->name('get_login');
Route::post('login', 'AuthController@postLogin')->name('post_login');
Route::get('register', 'AuthController@getRegister')->name('register');
Route::post('register', 'AuthController@postRegister')->name('post_register');
Route::get('call_active', 'AuthController@callActive')->name('call_active');
Route::get('logout', 'AuthController@logout')->name('logout');

//Route::get('/', function () {
//    return view('site.auth.login');
//})->middleware('guest');

Route::group(['namespace' => 'Site', 'middleware' => 'guest'] , function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('transactions', 'TransactionController@index')->name('transactions');
    Route::get('users', 'UserController@index')->name('users');
    Route::post('update-user', 'UserController@update')->name('update_user');
    Route::post('update-bank-account', 'UserController@updateBankAccount')->name('update_bank_account');
    Route::get('topup', 'TransactionController@topup')->name('topup');
    Route::post('post-topup', 'TransactionController@postTopup')->name('post_topup');
    Route::get('withdraw', 'TransactionController@withdraw')->name('withdraw');
    Route::post('post-withdraw', 'TransactionController@postWithdraw')->name('post_withdraw');
    Route::get('show-bank-account/{trans_id}', 'TransactionController@showBankAccount')->name('show_bank_account');
    Route::get('promotion', 'PromotionController@showPromotionActive')->name('promotion');
});






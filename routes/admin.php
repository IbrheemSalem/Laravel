<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('admin', function () {
    return "hello admin";
});

Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('users','UserController@showAdmin');
});

#Route::get('surce', 'App\Http\Controllers\Admin\AdminController@ShowAdminew');

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::get('surce', 'AdminController@ShowAdminew')->middleware('auth');
    Route::get('surce0', 'AdminController@ShowNaddilwer0');
    Route::get('surce1', 'AdminController@ShowNaddilwer1');
    Route::get('surce2', 'AdminController@ShowNaddilwer2');
    Route::get('surce3', 'AdminController@ShowNaddilwer3');
});
/*

Route::get('login', function(){
    return "Hello Users Page login";
})->name('login');
*/

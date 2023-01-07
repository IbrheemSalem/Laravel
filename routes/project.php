<?php
use Illuminate\Support\Facades\Route;


Route::get('project','App\Http\Controllers\ProjectController@index');
Route::get('index','App\Http\Controllers\ProjectController@index')->name('index');
Route::get('about','App\Http\Controllers\ProjectController@about')->name('about');
Route::get('marriage','App\Http\Controllers\ProjectController@marriage')->name('marriage');
Route::get('blog','App\Http\Controllers\ProjectController@blog')->name('blog');
Route::get('news','App\Http\Controllers\ProjectController@news')->name('news');
Route::get('contact','App\Http\Controllers\ProjectController@contact')->name('contact');

<?php

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

use Illuminate\Routing\Router;

Route::resource('/', 'TopController');

Auth::routes();

Route::resource('calendars', 'CalendarController');

Route::get('reserves/{user}', 'ReserveController@show');
Route::put('reserves/{user}', 'ReserveController@update');

Route::resource('lst', 'LstController');

Route::resource('feel', 'Feel\FeelController');
Route::get('feel/{user}/menu', 'Feel\FeelMenuController@index');
Route::get('feel/{user}/review', 'Feel\FeelReviewController@index');
Route::get('feel/{user}/profile', 'Feel\FeelProfileController@index');
Route::get('feel/{user}/reserve', 'Feel\FeelReserveController@index');

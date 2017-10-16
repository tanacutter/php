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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('calendars', 'CalendarController');

Route::get('profiles/', 'ProfileController@index');
Route::get('profiles/{user}', 'ProfileController@show');
Route::get('profiles/{user}/edit', 'ProfileController@edit');
Route::put('profiles/{user}', 'ProfileController@update');
Route::delete('profiles/{user}', 'ProfileController@delete');

// Route::resource('staffs', 'StaffController');

Route::resource('menus', 'MenuController');

Route::get('reserves/{user}', 'ReserveController@show');
Route::put('reserves/{user}', 'ReserveController@update');

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
    return view('home');
});
Route::get('/login',['uses' => 'Auth\LoginController@index', 'as' => 'login']);
Route::get('/logout',['uses' => 'Auth\LoginController@Logout', 'as' => 'logout']);
Route::get('/profile',['uses' => 'Account\ProfileController@index', 'as' => 'profile']);
Route::post('/profile',['uses' => 'Account\ProfileController@index', 'as' => 'profile']);
Route::post('/login',['uses' => 'Auth\LoginController@index', 'as' => 'login']);
Route::get('/register',['uses' => 'Auth\RegisterController@index', 'as' => 'register']);
Route::post('/register',['uses' => 'Auth\RegisterController@index', 'as' => 'register']);

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

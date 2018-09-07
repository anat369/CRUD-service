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
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/item', 'ItemController');
});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'middleware' => 'guest'], function() {
//    Route::get('/register', 'RegisterController@registerForm')->name('register');
//    Route::post('/register', 'RegisterController@register');
    Route::get('/login', 'LoginController@loginForm');
    Route::post('/login', 'LoginController@login')->name('login');
});

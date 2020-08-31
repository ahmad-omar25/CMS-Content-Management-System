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


Route::group(['prefix' => 'admin','middleware' => 'guest:admin', 'namespace' => 'Dashboard'], function () {
    Route::get('login', 'Auth\LoginController@showAdminLogin');
    Route::get('register', 'Auth\RegisterController@showAdminRegister');
    Route::post('login', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::post('register', 'Auth\RegisterController@createAdmin')->name('admin.register');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.dashboard');
    Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
});

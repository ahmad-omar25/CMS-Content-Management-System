<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','middleware' => 'guest:admin', 'namespace' => 'Dashboard'], function () {
    Route::get('login', 'Auth\LoginController@showAdminLogin');
    Route::get('register', 'Auth\RegisterController@showAdminRegister');
    Route::post('login', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::post('register', 'Auth\RegisterController@createAdmin')->name('admin.register');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {

    // Dashboard Home Page Route
    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Categories Route
    Route::resource('categories', 'CategoryController');

    // Posts Route
   // Route::resource('posts', 'PostController');

    // Logout Route
    Route::any('adminLogout', 'Auth\LoginController@adminLogout')->name('admin.logout');

});

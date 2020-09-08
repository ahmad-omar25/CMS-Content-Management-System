<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'Website\WebsiteController@index')->name('homepage');

Auth::routes();

Route::group(['prefix' => 'CMS','namespace' => 'Website'], function () {
    Route::get('/', 'WebsiteController@index')->name('homepage');
    Route::get('contact', 'WebsiteController@contact')->name('contact.us');
    Route::post('contact', 'WebsiteController@send_message')->name('send.message');
    Route::get('search', 'WebsiteController@search')->name('search');
    Route::get('/{slug}', 'WebsiteController@post_show')->name('post.show');
    Route::post('/{slug}', 'WebsiteController@store_comment')->name('post.add_comment');

});

Route::get('/home', 'HomeController@index')->name('home');

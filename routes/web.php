<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Website\WebsiteController@index')->name('homepage');

Auth::routes();

Route::get('/email/verify/{id}/{hash}',['as' => 'verification.verify','uses' => 'Auth\VerificationController@verify']);

Route::group(['prefix' => 'cms','namespace' => 'Website'], function () {

    Route::get('/', 'WebsiteController@index')->name('homepage'); // Homepage


    Route::group(['middleware' => 'auth:web', 'prefix' => 'user'], function () {

        // Logout
        Route::get('logout', 'WebsiteController@user_logout')->name('user.logout');

        // User Profile
        Route::resource('profile', 'UserController')->except('edit', 'destroy', 'create', 'store', 'show');


        // Edit Post Delete Image
        Route::post('/delete-post-media/{media_id}', 'PostController@post_media_destroy')->name('post.media.destroy');

        // User Posts
        Route::resource('posts', 'PostController');
    });



    // Contact Us
    Route::get('contact', 'WebsiteController@contact')->name('contact.us');
    Route::post('contact', 'WebsiteController@send_message')->name('send.message');

    // Search Input
    Route::get('search', 'WebsiteController@search')->name('search');

    // Posts and comments
    Route::get('/{slug}', 'WebsiteController@post_show')->name('post.show');
    Route::post('/{slug}', 'WebsiteController@store_comment')->name('post.add_comment');

    // Filter with ->>
    Route::get('category/{slug}', 'WebsiteController@category')->name('category'); // Category
    Route::get('archive/{date}', 'WebsiteController@archive')->name('archive'); // Archive
    Route::get('author/{username}', 'WebsiteController@author')->name('author'); // Author
   // Route::get('comment/{post}', 'WebsiteController@comment')->name('comment'); // Comment

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

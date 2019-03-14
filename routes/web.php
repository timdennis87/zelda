<?php

/*
 * Front Area
 *
 * */

Route::get('/', 'WelcomeController@index');

Route::get('/about-me', 'AboutController@index');

Route::get('/prints', 'PrintController@index');
Route::get('/show-print/{print}', 'PrintController@show');

Route::get('/paintings', 'PaintingController@index');
Route::get('/show-painting/{painting}', 'PaintingController@show');

Route::get('/exhibitions', 'ExhibitionController@index');

Route::get('/archive', 'ArchiveController@index');
Route::get('/archive-prints', 'ArchiveController@archivePrints');
Route::get('/archive-paintings', 'ArchiveController@archivePaintings');

Route::resource('/contact', 'MainMessageController');


/*
 * ADMIN AREA
 *
 * */

Auth::routes();

Route::get('/admin', 'Admin\HomeController@index');

// Check if user is logged in before admin pages
Route::group(['middleware' => ['auth']], function() {

    // Exhibitions
    Route::resource('admin/exhibitions', 'Admin\ExhibitionController');

    // Prints
    Route::resource('admin/printings', 'Admin\PrintingController');

    // Paintings
    Route::resource('admin/paintings', 'Admin\PaintingController');

    //About Me
    Route::resource('admin/about-me', 'Admin\AboutController');

    //Messages
    Route::get('admin/messages', 'Admin\MessageController@index');
    Route::get('admin/messages/show/{message}', 'Admin\MessageController@show');
    Route::post('admin/messages/show/{message}', 'Admin\MessageController@update');

});


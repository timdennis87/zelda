<?php

/*
 * Front Area
 *
 * */

Route::get('/', 'WelcomeController@welcome');

Route::get('/about-me', 'AboutController@aboutMe');

Route::get('/prints', 'PrintController@showPrints');
Route::get('/show-print/{print}', 'PrintController@showIndividualPrint');

Route::get('/paintings', 'PaintingController@showPaintings');
Route::get('/show-painting/{painting}', 'PaintingController@showIndividualPainting');

Route::get('/exhibitions', 'ExhibitionController@showExhibitions');

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
    Route::get('admin/messages', 'Admin\MessageController@showAllMessages');
    Route::get('admin/messages/show/{message}', 'Admin\MessageController@showIndividualMessage');
    Route::post('admin/messages/show/{message}', 'Admin\MessageController@updateMessage');

});


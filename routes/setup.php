<?php


use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['CheckAuth', 'CheckGroup']], function () {
    Route::prefix('/dashboard/stations')->group(function () {

        Route::get('/', 'StationsController@index');
        Route::post('/', 'StationsController@add');
        Route::get('/updated/{id?}', 'StationsController@updatedView');
        Route::post('/updated', 'StationsController@updatedProcess');
    });

//setup term table

    Route::prefix('/dashboard/terms')->name('terms')->group(function () {

        Route::get('/', 'TermsController@index');
        Route::post('/', 'TermsController@add');
        Route::get('/edit/{id?}', 'TermsController@edit')->name('.edit');
        Route::get('/updated/to/active/{id?}', 'TermsController@toActive');

        Route::post('/updated', 'TermsController@update')->name('.update');

        Route::delete('delete/{id?}', 'TermsController@destroy')->name('.destroy');
    });

//setup method (payment_settings الباقات) table

    Route::prefix('/dashboard/methods')->name('methods')->group(function () {

        Route::get('/', 'PaymentSettingsController@index');
        Route::post('/', 'PaymentSettingsController@add')->name('.store');
        Route::get('/edit/{id?}', 'PaymentSettingsController@edit')->name('.edit');

        Route::post('/updated', 'PaymentSettingsController@update')->name('.update');

        Route::delete('/delete/{id?}', 'PaymentSettingsController@destroy')->name('.destroy');
    });

   // check in Date Daily

    Route::prefix('/dashboard/check_in_daily')->name('check_in_daily')->group(function () {

        Route::get('/', 'CheckDateDaily@index');
        Route::post('/', 'CheckDateDaily@store')->name('.store');

    });

     Route::prefix('/dashboard/check_in_answer')->name('check_in_answer')->group(function () {

         Route::get('/', 'CheckInAnswer@index');
         Route::post('/', 'CheckInAnswer@store')->name('.store');

     });

});




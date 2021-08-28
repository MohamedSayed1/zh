<?php

use Illuminate\Support\Facades\Route;


//subscribes table اشتراك الطالب

Route::prefix('/dashboard/subscribes')->middleware(['CheckAuth', 'CheckGroup'])->name('subscribe')->group(function () {

    Route::get('/{id?}', 'SubscribeController@index');
    Route::get('/installment/details/{id?}', 'SubscribeController@getInstallmentById')->name('.installment.details');

    Route::post('/', 'SubscribeController@store')->name('.store');
    Route::get('/edit/{id?}', 'SubscribeController@edit')->name('.edit');

    Route::post('/updated', 'SubscribeController@update')->name('.update');

    Route::delete('/delete/{id?}', 'SubscribeController@destroy')->name('.destroy');
    //subscribe.installment
    Route::get('/installment/{id?}', 'SubscribeController@add_Installment')->name('.installment');
    Route::post('/installment/store', 'SubscribeController@store_Installment')->name('.installment.store');
//

    //ajaxcost
    Route::get('/cost/{id?}', 'SubscribeController@getCost')->name('.cost');





});



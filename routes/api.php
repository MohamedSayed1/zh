<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::group([

    'middleware' => 'api',
    //'prefix' => 'auth',
    'namespace'=>'api'

], function () {

    Route::post('login', 'LoginApi@login');


});


//// Routes based on roles of user

Route::group(['namespace'=>'api', 'middleware'  => ['api','jwt.token']], function () {

    Route::post('logout', 'LoginApi@logout');
    Route::post('refresh', 'LoginApi@refresh');
    Route::post('me', 'LoginApi@me');

    Route::prefix('appointment')->group(function () {
        Route::post('/', 'AppointmentApi@index');
        Route::post('/item/{id?}', 'MovedController@index');
        Route::post('/item/send/add', 'MovedController@add');
        Route::get('/item/send/updated/type/{id?}', 'MovedController@updatedType');
        Route::post('/item/send/updated', 'MovedController@updated');

    });
});

<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (!Auth::check())
         return view('admin.login');


    if(in_array(Auth()->user()->group_id,[1,2]))
        return redirect('dashboard/users');
    else
        return view('welcome');
});
Route::post('/login', 'LoginController@login');
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/logout', function () {
    if (Auth::check()) {
        Auth::logout();
        return redirect('/');
    }
    return redirect()
        ->back();
})->middleware('CheckAuth');
Route::group(['middleware' => ['CheckAuth','CheckGroup']], function () {



    Route::prefix('/dashboard/users')->group(function () {

        Route::get('/', 'UsersController@index');
        Route::post('/', 'UsersController@search');
        Route::get('/add', 'UsersController@add');
        Route::post('/add', 'UsersController@addProcess');
        Route::get('/updated/{id?}', 'UsersController@updatedView');
        Route::post('/updated', 'UsersController@updated');
        Route::get('/change/password/{id?}', 'UsersController@passView');
        Route::post('/change/password', 'UsersController@pass');
    });

// Appointment Rouet

    Route::prefix('/dashboard/appointment')->group(function () {

        Route::get('/', 'AppointmentController@index');
        Route::post('/', 'AppointmentController@add');
        Route::get('/updated/{id?}', 'AppointmentController@updatedView');
        Route::post('/updated', 'AppointmentController@updatedProcess');
        Route::get('/search', 'AppointmentController@Search');
        Route::post('/search', 'AppointmentController@SearchProcess');
    });
});






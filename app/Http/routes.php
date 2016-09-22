<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::get('/', function() {
    return redirect()->route('home');
});

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::resource('cow', 'CowController');
Route::resource('breeding', 'BreedingController');
Route::put('breeding/{breeding}/status/{status}', 'BreedingController@updateStatus')->name('breeding.update.status');
Route::resource('treatment', 'TreatmentController');
Route::put('treatment/{treatment}/treatable', 'TreatmentController@updateTreatable')->name('treatment.update.treatable');
Route::group(['prefix' => 'dashboard'], function() {
    Route::get('herds', 'DashboardController@herds');
    Route::get('breedings/status/{status}', 'DashboardController@breedingsByStatus');
    Route::get('treatments/notdone', 'DashboardController@treatmentsNotDone');
});
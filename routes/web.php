<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// for loging out
Route::get('/logout', 'Auth\LoginController@logout');

// for listings
Route::get('/listings', 'ListingController@index');
Route::get('/listings/create', 'ListingController@create');
Route::post('/listings', 'ListingController@store');
Route::get('/listings/{listing}/edit', 'ListingController@edit');
Route::get('/listings/{listing}', 'ListingController@show');
Route::patch('/listings/{listing}', 'ListingController@update');
Route::delete('/listings/{listing}', 'ListingController@destroy');


// for rent request
Route::get('/rentRequests', 'RentRequestController@index');
Route::get('/rentRequests/create', 'RentRequestController@create');
Route::post('/rentRequests', 'RentRequestController@store');
Route::get('/rentRequests/{listing}/edit', 'RentRequestController@edit');
Route::get('/rentRequests/{listing}', 'RentRequestController@show');
Route::patch('/rentRequests/{listing}', 'RentRequestController@update');
Route::delete('/rentRequests/{listing}', 'RentRequestController@destroy');

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update-gender/{client_id}/update_gender', 'ClientController@genderStatus')->name('gender_status');
Route::post('/update-gender/{client_id}', 'ClientController@updateGenderStatus')->name('gender_update');
Route::resource('clients', 'ClientController');

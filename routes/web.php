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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', function () { return redirect('login'); });


Route::group( ['middleware' => 'auth'],  function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/update-gender/{client_id}/update_gender', 'ClientController@genderStatus')->name('gender_status');
    Route::post('/update-gender/{client_id}', 'ClientController@updateGenderStatus')->name('gender_update');

    Route::resource('clients', 'ClientController');
    Route::resource('projects', 'ProjectController');
    Route::resource('onsite-visit', 'OnsiteVisitController');
    Route::resource('reports', 'ReportController');
    
    Route::resource('stage-of-completion', 'StageOfCompletionController');
    Route::get('/projects/create/{id}','ProjectController@getTowns');
    Route::any('/stage-of-completion/{image}/delete', 'StageOfCompletionController@deleteImage');
    Route::get('/onsite-visit/create/{id}','OnsiteVisitController@clientToProject');
});




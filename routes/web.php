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
// Route::get('/create', 'ClientController@create')->name('new-client');
Route::resource('clients', 'ClientController');
// Route::get('/projects', 'ProjectController@index')->name('projects');
// Route::get('/project-status', 'ProjectStatusController@index')->name('project-status');
// Route::get('/project-report', 'ProjectReportController@index')->name('project-report');
// Route::get('/users', 'UserRoleController@index')->name('users');

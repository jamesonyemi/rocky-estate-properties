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

Route::get('/logout', function () { return redirect('/'); });

Route::group( ['middleware' => 'auth'],  function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/update-gender/{client_id}/update_gender', 'ClientController@genderStatus')->name('gender_status');
    Route::post('/update-gender/{client_id}', 'ClientController@updateGenderStatus')->name('gender_update');

    Route::resource('clients', 'ClientController');
    Route::any('/corporate-client', 'ClientController@corporateClient')->name('corporate-client');
    Route::any('/edit-corporate-client/{id}/edit_corporate', 'ClientController@editCorporateClient')->name('edit-corporate-client');
    Route::any('/update-corporate-client/{id}', 'ClientController@updateCorporateClient')->name('update-corporate-client');
    Route::any('/corporate-client/{id}', 'ClientController@viewCorporateClient')->name('view-corporate-client');
    Route::any('/corporate-client/{id}', 'ClientController@destroyCorporateClient')->name('delete-corporate-client');

    Route::resource('projects', 'ProjectController');
    Route::resource('project-docs', 'ProjectDocumentController');
    Route::resource('onsite-visit', 'OnsiteVisitController');
    Route::resource('reports', 'ReportController');
    Route::resource('stage-of-completion', 'StageOfCompletionController');
    
    Route::resource('payment-mode', 'PaymentModeController');
    Route::resource('payments', 'PaymentController');
    Route::get('/payments/create/{id}','PaymentController@client');
    Route::any('/additional-cost', 'PaymentController@additionalCost')->name('additional-cost');
    Route::any('/process-additional-cost', 'PaymentController@processAdditionalCost')->name('process-additional-cost');
    Route::any('/budget-review', 'PaymentController@budgetReview')->name('budget-review');
    
    Route::get('/projects/create/{id}','ProjectController@getTowns');
    Route::any('/stage-of-completion/{image}/delete', 'StageOfCompletionController@deleteImage');
    Route::get('/onsite-visit/create/{id}','OnsiteVisitController@clientToProject');

    Route::prefix('system-setup')->group(function () {
        Route::resource('towns', 'TownController');
        Route::resource('nationality', 'NationalityController');
        Route::resource('title', 'TitleController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('role', 'UserRoleController');
        Route::any('/assign-role-to-user', 'UserRoleController@assignUserRole')->name('assign-role-to-user');
        Route::any('/assign-role', 'UserRoleController@userRole')->name('assign-role');
        Route::resource('branches', 'BranchController'); 
        Route::resource('status', 'StatusController');
        Route::resource('regions', 'RegionController');
        Route::resource('gender', 'GenderController');
    });

});





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


Auth::routes();

Route::get('/', function () {
    return view('auth.login');  
});

// Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
//     // Authentication Routes...
//     Route::get('login', 'LoginController@showLoginForm')->name('login');
//     Route::post('login', 'LoginController@login');
//     Route::post('logout', 'LoginController@logout')->name('logout');

//     // Password Reset Routes...
//     Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//     Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('forgot-password');
//     Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
//     Route::post('password/reset', 'ResetPasswordController@reset');
// });


Route::get('/logout', function () { return redirect('/'); });
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/client/sign-up/{clientid}', 'Auth\RegisterController@sigUpClient');


Route::group( ['middleware' => 'auth', 'prefix' => 'admin-portal'],  function() {

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
    Route::resource('verified-users', 'VerifiedUserController');
    Route::any('/import-users', 'VerifiedUserController@import')->name('import-users');
    Route::any('/export-users', 'VerifiedUserController@export')->name('export-users');
    
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


    Route::group( ['middleware' => 'auth', 'prefix' => 'client-portal'], function () {
        Route::get('/dashboard', function() { 
            return view('client_portal.dashboard.index');
         })->name('client-dashboard');
        Route::resource('personal-details', 'Clients\ClientPersonalDetailsController');
        Route::resource('my-projects', 'Clients\ClientProjectController');
    });




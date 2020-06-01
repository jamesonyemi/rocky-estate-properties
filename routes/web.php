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

    Route::get('/', 'DefaultPageController@CheckIn');

    Route::get('/logout', 'DefaultPageController@CheckOut');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/client/sign-up/{clientid}', 'Auth\RegisterController@sigUpClient');
    Route::get('/client/sign-in/{clientid}', 'Auth\RegisterController@signInVerifiedIndividualClient');

    Route::group( ['middleware' => 'auth', 'prefix' => 'admin-portal'],  function() {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/update-gender/{client_id}/update_gender', 'ClientController@genderStatus')->name('gender_status');
        Route::post('/update-gender/{client_id}', 'ClientController@updateGenderStatus')->name('gender_update');

        Route::resource('clients', 'ClientController');
        Route::any('/corporate-client', 'ClientController@corporateClient')->name('corporate-client');
        Route::any('/corporate-client-wp', 'ClientController@corporateClientWithProject')->name('corporate-client-wp');
        Route::any('/client-wp', 'ClientController@IndividualClientWithProject')->name('client-wp');
        Route::any('/client-wnp', 'ClientController@IndividualClientWithNoProject')->name('client-wnp');
        Route::any('/corporate-client-wnp', 'ClientController@corporateClientWithNoProject')->name('corporate-client-wnp');
        Route::get('/edit-corporate-client/{id}/edit_corporate', 'ClientController@editCorporateClient')->name('edit-corporate-client');
        Route::any('/edit-corporate-client/{id}', 'ClientController@updateCorporateClient')->name('update-corporate-client');
        Route::any('/view-corporate-client/{id}', 'ClientController@viewCorporateClient')->name('view-corporate-client');
        Route::any('/corporate-client/{id}', 'ClientController@destroyCorporateClient')->name('delete-corporate-client');

        Route::resource('projects', 'ProjectController');
        Route::resource('project-docs', 'ProjectDocumentController')->middleware('checkUserRole');
        Route::resource('onsite-visit', 'OnsiteVisitController');
        Route::resource('reports', 'ReportController');
        Route::resource('stage-of-completion', 'StageOfCompletionController');
        Route::any('/remove-unlink-image/{id}/{img_name}','StageOfCompletionController@deleteImage')->name('remove-unlink-image');
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
            Route::get('/restore-form', 'TownController@restore')->name('restore-form');
            Route::any('/towns/get-restore-data/{id}', 'TownController@getTown')->name('get-restore-data');
            Route::any('/restore-update', 'TownController@restoreTown')->name('restore-update');
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


    Route::get('corporate-login-form', 'Clients\ClientAuthController@index')->name('corporate-login-form');
    Route::post('corporate-client-post-login', 'Clients\ClientAuthController@postLogin')->name('corporate-post-login');
    Route::get('corporate-client-registration', 'Clients\ClientAuthController@registration')->name('corporate-registration-form');
    Route::post('corporate-client-post-registration', 'Clients\ClientAuthController@postRegistration')->name('corporate-post-registration');
    Route::get('dashboard', 'Clients\ClientAuthController@dashboard');
    Route::get('corporate-client-logout', 'Clients\ClientAuthController@logout')->name('corporate-client-logout');

    Route::group( ['middleware' => 'auth', 'prefix' => 'client-portal'], function () {
        Route::get('/dashboard', 'DefaultPageController@clientDashboard')->name('client-dashboard');
        Route::resource('personal-details', 'Clients\ClientPersonalDetailsController');
        Route::resource('my-projects', 'Clients\ClientProjectController');
        Route::resource('my-documents', 'Clients\ClientDocumentController');
        Route::resource('my-onsite-visit', 'Clients\ClientOnsiteVisitController');
        Route::resource('my-stage-of-completion', 'Clients\ClientStageOfCompletionController');
        Route::resource('my-payments', 'Clients\ClientPaymentBreakDownController');
        Route::resource('my-project-tracking', 'Clients\ClientProjectTrackingController');
        // Route::get('tracking', 'Clients\ClientProjectTrackingController@projectTracking')->name('tracking');
        Route::get('my-projects/single-project/{id}', 'Clients\ClientProjectController@clientWithSingleProject')->name('single-project');
    });
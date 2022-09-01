<?php

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
    return view('welcome');
});

// clear application cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Application cache flushed";
});

// clear route cache
Route::get('/clear-route-cache', function() {
    Artisan::call('route:clear');
    return "Route cache file removed";
});

// clear view compiled files
Route::get('/clear-view-compiled-cache', function() {
    Artisan::call('view:clear');
    return "View compiled files removed";
});

// clear config files
Route::get('/clear-config-cache', function() {
    Artisan::call('config:clear');
    return "Configuration cache file removed";
});

/**
 * Json Response with web middleware
 */
include 'json.php';

Route::group(['namespace' => 'BackEndCon', 'middleware' => ['auth:admin']], function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard.index');
    Route::resource('groups', 'GroupController');
    Route::resource('hajj-groups', 'HajjGroupController');
    Route::resource('omra-hajj-groups', 'OmraHajjGroupController');
    Route::resource('customer', 'CustomerController');
    Route::get('customer/pdf/{customer}', 'CustomerController@customerInfoPDF')->name('customer.pdf');
    Route::post('/passport-info/delete-document/{document_id}', 'PassportController@deleteDocument');
    Route::resource('passport-info', 'PassportController');
    Route::resource('passport-collection', 'PassportCollectionController');
    Route::get('passport-collection/pdf/{passport_collection}', 'PassportCollectionController@pdf')->name('passport-collection.pdf');
    Route::get('passport-history/receipt/print/{id}', 'PassportHistoryController@printReceipt')->name('passport-history.print-receipt');
    Route::resource('passport-history', 'PassportHistoryController');
    Route::post('passport-history/change-status', 'PassportHistoryController@changeStatus')->name('passport-history.change-status');
    Route::resource('hajj-package', 'HajjPackageController');
    Route::resource('omra-hajj-package', 'OmraHajjPackageController');
    Route::resource('haji', 'HajjController');
    Route::resource('omra-haji', 'OmraHajjController');
    Route::resource('sms-sending-system', 'SmsSenderController');

    Route::get('deposit-details/{hajj_id}', 'Accounts\DepositController@depositDetails')->name('deposit-details.view');

    Route::get('haji-payment-details', 'HajjPaymentController@index')->name('hajj-payment.index');
    Route::get('haji-payment-details/{payment_id}', 'HajjPaymentController@destroy')->name('hajj-payment.destroy');
    Route::get('hajj-payment/create/{hajj_id}', 'HajjPaymentController@create')->name('hajj-payment.create');
    Route::post('hajj-payment', 'HajjPaymentController@store')->name('hajj-payment.store');
    Route::get('hajj-payment/{payment_id}/edit', 'HajjPaymentController@edit')->name('hajj-payment.edit');
    Route::put('hajj-payment/{payment_id}', 'HajjPaymentController@update')->name('hajj-payment.update');

    Route::get('omra-haji-payment-details', 'OmraHajjPaymentController@index')->name('omra-hajj-payment.index');
    Route::get('omra-haji-payment-details/{payment_id}', 'OmraHajjPaymentController@destroy')->name('omra-hajj-payment.destroy');
    Route::get('omra-hajj-payment/create/{hajj_id}', 'OmraHajjPaymentController@create')->name('omra-hajj-payment.create');
    Route::post('omra-hajj-payment', 'OmraHajjPaymentController@store')->name('omra-hajj-payment.store');
    Route::get('omra-hajj-payment/{payment_id}/edit', 'OmraHajjPaymentController@edit')->name('omra-hajj-payment.edit');
    Route::put('omra-hajj-payment/{payment_id}', 'OmraHajjPaymentController@update')->name('omra-hajj-payment.update');

    // Makka-Madina Management Routes
    Route::resource('hotel-rate', 'HotelRateController');
    Route::resource('vehicle-rate', 'VehicleRateController');
    // END Makka-Madina Management Routes



//country list
Route::get('/add-country', 'CountryController@addCountry')->name('add-country');
Route::post('/save-country', 'CountryController@saveCountry')->name('save-country');
Route::get('/view-country', 'CountryController@viewCountry')->name('view-country');
Route::get('/country/published/{id}', 'CountryController@publishedCountry')->name('published-country');
Route::get('/country/unpublished/{id}', 'CountryController@unpublishedCountry')->name('unpublished-country');
Route::post('/update-country', 'CountryController@updateCountry')->name('update-country');
// Route::get('/edit-country/{id}', 'CountryController@editCountry')->name('edit-country');
Route::get('/delete-country/{id}', 'CountryController@deleteCountry')->name('delete-country');





//renter list
Route::get('/renter-details', 'RenterController@index')->name('details-renter');
Route::get('/add-renter', 'RenterController@addRenter')->name('add-renter');
Route::post('/save-renter', 'RenterController@saveRenter')->name('save-renter');
Route::get('/view-renter', 'RenterController@viewRenter')->name('view-renter');

Route::get('/v-renter/{id}', 'RenterController@vRenter')->name('v-renter');


Route::get('/renter/published/{id}', 'RenterController@publishedRenter')->name('published-renter');
Route::get('/renter/unpublished/{id}', 'RenterController@unpublishedRenter')->name('unpublished-renter');
Route::post('/update-renter', 'RenterController@updateRenter')->name('update-renter');
// Route::get('/edit-renter/{id}', 'RenterController@editRenter')->name('edit-renter');
Route::post('/delete-renter/{id}', 'RenterController@deleteRenter')->name('delete-renter');



//paid renters
Route::get('/paid-renters', 'DashboardController@paidRenter')->name('paid-renters');
//due renters
Route::get('/due-renters', 'DashboardController@dueRenter')->name('due-renters');







//House List
Route::get('/add-house', 'HouseController@addHouse')->name('add-house');
Route::post('/save-house', 'HouseController@saveHouse')->name('save-house');
Route::get('/view-house', 'HouseController@viewHouse')->name('view-house');
Route::get('/house/published/{id}', 'HouseController@publishedHouse')->name('published-house');
Route::get('/house/unpublished/{id}', 'HouseController@unpublishedHouse')->name('unpublished-house');
Route::post('/update-house', 'HouseController@updateHouse')->name('update-house');
Route::get('/edit-house/{id}', 'HouseController@editHouse')->name('edit-house');
Route::post('/delete-house/{id}', 'HouseController@deleteHouse')->name('delete-house');








//flat list
Route::get('/add-flat', 'FlatController@addFlat')->name('add-flat');
Route::post('/save-flat', 'FlatController@saveFlat')->name('save-flat');
Route::get('/view-flat', 'FlatController@viewFlat')->name('view-flat');
Route::get('/flat/published/{id}', 'FlatController@publishedFlat')->name('published-flat');
Route::get('/flat/unpublished/{id}', 'FlatController@unpublishedFlat')->name('unpublished-flat');
Route::post('/update-flat', 'FlatController@updateFlat')->name('update-flat');
Route::get('/edit-flat/{id}', 'FlatController@editFlat')->name('edit-flat');
Route::post('/delete-flat/{id}', 'FlatController@deleteFlat')->name('delete-flat');



//renter-flat list
Route::get('/add-rflat', 'RflatController@addRflat')->name('add-rflat');
Route::post('/save-rflat', 'RflatController@saveRflat')->name('save-rflat');
Route::get('/view-rflat', 'RflatController@viewRflat')->name('view-rflat');
// Route::get('/rflat/published/{id}', 'RflatController@publishedRflat')->name('published-rflat');
// Route::get('/rflat/unpublished/{id}', 'RflatController@unpublishedRflat')->name('unpublished-rflat');
Route::post('/update-rflat', 'RflatController@updateRflat')->name('update-rflat');
Route::get('/edit-rflat/{id}', 'RflatController@editRflat')->name('edit-rflat');
Route::post('/delete-rflat/{id}', 'RflatController@deleteRflat')->name('delete-rflat');





//monthly-total list
Route::get('/add-total', 'TotalController@addTotal')->name('add-total');

Route::post('/get-all-total', 'TotalController@getTotal')->name('get-all-total');
// Route::get('/get-total', 'TotalController@getTotal')->name('get-all-total');
Route::post('/save-total', 'TotalController@saveTotal')->name('save-total');
Route::get('/view-total', 'TotalController@viewTotal')->name('view-total');
Route::get('/total/published/{id}', 'TotalController@publishedTotal')->name('published-total');
Route::get('/total/unpublished/{id}', 'TotalController@unpublishedTotal')->name('unpublished-total');
Route::post('/update-total', 'TotalController@updateTotal')->name('update-total');
Route::get('/edit-total/{id}', 'TotalController@editTotal')->name('edit-total');
Route::post('/delete-total/{id}', 'TotalController@deleteTotal')->name('delete-total');


Route::get('/create-receipt', 'TotalController@createReceipt');
Route::post('/save-receipt', 'TotalController@saveReceipt')->name('save-receipt');








    // Accounts Management Routes
    Route::group(['namespace' => 'Accounts'], function () {
        Route::get('deposit-list/receipt/print/{id}', 'DepositController@printReceipt')->name('deposit-list.print-receipt');
        Route::resource('deposit-list', 'DepositController');
        Route::get('deposit-list/add/{hajj_id}', 'DepositController@addPayment')->name('deposit-list.add-payment');
        Route::post('hajj-payment-status/change', 'DepositController@changePaymentStatus')->name('deposit-list.change-status');
        Route::resource('expense-list', 'ExpenseController');
        Route::resource('cash-in-hand', 'CashInHandController');
    });
    // END Accounts Management Routes

    Route::resource('customer-payment', 'CustomerPaymentController');

    Route::resource('visa-management', 'VisaManagementController');

    // Reports Routes
    Route::group(['namespace' => 'Reports'], function () {
        Route::resource('total-report', 'TotalReportController');
        Route::resource('haji-report', 'HajjReportController');
        Route::resource('omra-haji-report', 'OmraHajjReportController');
        Route::resource('passport-report', 'PassportReportController');
    });
    // END Reports Routes

    Route::resource('passport-status', 'PassportStatusController');
});

// Turned off Register Routes
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

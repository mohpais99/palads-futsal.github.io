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


Route::get('/login', 'AuthController@index')->name('login');
Route::post('/post-login', 'AuthController@postLogin');

Route::get('/register', 'AuthController@register');
Route::post('/register-store', 'AuthController@registerStore');

Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin', 'DashboardController@index');
    Route::get('/list-user', 'DashboardController@user');
    Route::get('/find-user', 'DashboardController@cariUser');
    Route::get('/user-detail/{id}', 'DashboardController@userDetail');
    Route::get('/user/{id}/update', 'DashboardController@userUpdate');
    Route::get('/user/{id}/delete', 'DashboardController@userDelete');
    Route::get('/list-lapangan', 'DashboardController@lapangan');
    Route::post('/lapangan/store', 'DashboardController@lapanganStore');
    Route::get('/lapangan/{slug}', 'DashboardController@lapanganEdit');
    Route::post('/lapangan/{id}/update', 'DashboardController@lapanganUpdate');
    Route::get('/lapangan/{id}/destroy', 'DashboardController@lapanganDestroy');
    Route::get('/list-booking', 'DashboardController@booking')->name('booking');
    Route::get('/find-booking', 'DashboardController@cariBooking');
    Route::get('/list-payment', 'DashboardController@pembayaran')->name('payment');
    Route::get('/find-payment', 'DashboardController@cariPayment');
    Route::post('/list-payment/{id}/update', 'DashboardController@pembayaranUpdate');
    Route::get('/list-payment/{id}/destroy', 'DashboardController@pembayaranDestroy');
    Route::get('/list-payment-detail/{id}', 'DashboardController@confirmpembayaran');
    Route::get('/list-history', 'DashboardController@riwayat');
    Route::get('/find-history', 'DashboardController@cariRiwayat');
    Route::get('/list-history/{id}/destroy', 'DashboardController@riwayatDestroy');
    Route::get('/list-gallery', 'DashboardController@gallery');
    Route::get('/add-gallery', 'DashboardController@addGallery');
    Route::post('/push-gallery', 'DashboardController@pushGallery');
    Route::get('/list-event', 'DashboardController@event');
    Route::get('/add-event', 'DashboardController@addEvent');
    Route::post('/push-event', 'DashboardController@pushEvent');
    Route::get('/event/{slug}', 'DashboardController@showEvent');
    Route::post('/event/{id}/update', 'DashboardController@editEvent');
    Route::get('/event/{id}/destroy', 'DashboardController@eventDestroy');
    Route::get('/list-message', 'DashboardController@message');
    Route::get('/message/{id}/delete', 'DashboardController@messageDelete');
});

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/home/{slug}', 'HomeController@lapanganView');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/event', 'HomeController@event');

Route::post('/message', 'HomeController@messageStore');


Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
    Route::get('/member', 'HomeController@member');
    Route::get('/booking', 'BookingController@index');
    Route::post('/booking/store', 'BookingController@store');
    Route::get('/payment', 'HomeController@payment');
    Route::post('/payment/{id}/store', 'HomeController@paymentStore');
    Route::get('/payment/{id}/expired', 'HomeController@paymentExpired');
    Route::get('/history', 'HomeController@history');
    Route::get('/history/{id}/update', 'HomeController@historyUpdate');
    Route::get('/history/{id}/delete', 'HomeController@historyDelete');
});


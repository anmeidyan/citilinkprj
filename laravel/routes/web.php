<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('getlogin','Web\AppController@getlogin');
Route::get('getregist','Web\AppController@getregist');

//------------------------------------------------------------------ FRONT START

Route::get('/', 'Web\HomeController@index');
Route::post('getcity', 'Web\HomeController@getcity');
//BLOGS-------------------------------------------------------------------------
Route::get('blog/{url}','Web\BlogsController@getblog');
//CARS--------------------------------------------------------------------------
Route::get('cars', 'Web\CarsController@index');
Route::post('cars', 'Web\CarsController@searchcar');
Route::post('cars/api/available', 'Web\CarsController@apicars');
Route::post('cars/prepare_addon', 'Web\CarsController@prepare_addon');
Route::post('find_cars','Web\CarsController@find_cars');
//CARS ADDON--------------------------------------------------------------------
Route::get('cars/add-on', 'Web\AddOnController@index');
Route::post('cars/api/addon', 'Web\AddOnController@apiaddon');
Route::post('cars/prepare_payment', 'Web\AddOnController@prepare_payment');
//CARS PAYMENT------------------------------------------------------------------
Route::get('cars/payment', 'Web\PaymentController@index');
Route::post('cars/payment', 'Web\PaymentController@dopayment');

Route::get('thankyou/{booking}', 'Web\ThankyouController@index');


//MANAGE BOOKING----------------------------------------------------------------
Route::get('manage_booking', 'Web\BookingController@index');
Route::post('manage_booking', 'Web\BookingController@index');


Route::post('manage_booking/api', 'Web\BookingController@manage_booking');
Route::post('manage_booking/api/docancel', 'Web\BookingController@docancel');







Route::group(['middleware' => 'auth'],function(){

    // POST BLOGS
    Route::post('comment','Web\BlogsController@postcomment');

});

//-------------------------------------------------------------------- FRONT END

/*
|-------------------------------------------------------------------------------
| ADMIN
|-------------------------------------------------------------------------------
*/

Route::group(['middleware' => 'admin','superadmin'],function(){
    //DASHBOARD-----------------------------------------------------------------
    Route::get('/admin', function () {
        return Redirect('admin/dashboard');
    });
    Route::get('admin/dashboard', 'Admin\DashboardController@index');
    //USERS---------------------------------------------------------------------
    Route::resource('admin/users','Admin\UsersController');
    //BLOG----------------------------------------------------------------------
    Route::resource('admin/blogs','Admin\BlogsController');
    //SLIDER--------------------------------------------------------------------
    Route::resource('admin/sliders','Admin\SlidersController');
    //CAR-----------------------------------------------------------------------
    Route::resource('admin/cars','Admin\CarsController');
    //SETTING-------------------------------------------------------------------
    Route::resource('admin/setting','Admin\SettingsController');
});

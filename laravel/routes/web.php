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


Route::get('services', 'Web\ServicesController@index');
Route::get('cars', 'Web\CarsController@index');
Route::post('cars', 'Web\CarsController@searchcar');
Route::post('cars/available', 'Web\CarsController@carsavailable');


Route::group(['middleware' => 'web','auth'],function(){



});

//-------------------------------------------------------------------- FRONT END

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
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

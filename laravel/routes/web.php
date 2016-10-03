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
Route::get('select-car', 'Web\SelectCarController@index');


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
        return view('admin.dashboard');
    });
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

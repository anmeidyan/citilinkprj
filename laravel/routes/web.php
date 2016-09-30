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

//------------------------------------------------------------------ FRONT START


Route::get('/', 'Web\HomeController@index');
Route::post('getcity', 'Web\HomeController@getcity');


Route::get('services', 'Web\ServicesController@index');
Route::get('select-car', 'Web\SelectCarController@index');


Route::group(['middleware' => 'web','auth'],function(){



});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'admin'],function(){

});
/*
|-------------------------------------------------------------------------------
| SUPER ADMIN
|-------------------------------------------------------------------------------
*/

Route::get('admin/login', function ()
{
  # code...
  return view('auth.login');
});

Route::group(['middleware' => 'superadmin'],function(){
    //DASHBOARD--------------------------------------------------------------------
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    //SLIDER--------------------------------------------------------------------
    Route::resource('admin/sliders','Admin\SlidersController');
    //SETTING--------------------------------------------------------------------
    Route::resource('admin/setting','SettingsController');

});

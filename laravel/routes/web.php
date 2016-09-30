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

//------------------------------------------------------------------ FRONT START

Auth::routes();

Route::get('/', 'Web\HomeController@index');

Route::get('/layanan', function () {
    return view('front.layanan');
});
Route::get('/pilihmobil', function () {
    return view('front.pilih');
});

Route::group(['middleware' => 'web','auth'],function(){



});

//-------------------------------------------------------------------- FRONT END
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

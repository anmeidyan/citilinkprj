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

Route::get('/', function () {
    return view('front.home');
});

Route::get('/layanan', function () {
    return view('front.layanan');
});
Route::get('/pilihmobil', function () {
    return view('front.pilih');
});
//-------------------------------------------------------------------- FRONT END

//------------------------------------------------------------------- BACK START
Route::get('/admin', function () {
    return view('admin.dashboard');
});



/*
|--------------------------------------------------------------------------
| SLIDER
|--------------------------------------------------------------------------
*/
Route::resource('admin/slider','SliderController');


/*
|--------------------------------------------------------------------------
| SETTING
|--------------------------------------------------------------------------
*/
Route::resource('admin/setting','SettingsController');

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

Route::prefix('household')->name('household.')->group(function () {
    Route::post('store/amphures', 'InfoController@getAmphures')->name('amphures');
    Route::post('store/districts', 'InfoController@getDistricts')->name('districts');
});

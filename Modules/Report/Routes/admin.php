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

Route::middleware('admin')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::name('report.')->group(function() {
        Route::prefix('report')->group(function() {
            Route::prefix('dataset')->name('dataset.')->group(function () {
                Route::get('/', 'HouseholdController@index')->name('index');
                Route::get('/export-xlxs', 'HouseholdController@exportExcel')->name('export-xlxs');
            });
        });
    });
});
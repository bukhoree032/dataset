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

Route::name('admin.')->group(function() {
    Route::resource('member', 'MemberController', ['except' => ['show']]);
    Route::name('member.')->group(function() {
        Route::prefix('member')->group(function() {
            Route::resource('change-password', 'ChangePasswordController', ['except' => ['index', 'create', 'store', 'show', 'destroy']]);
            Route::put('{member}/pay', 'PayController@index')->name('pay');
        });
    });

    Route::get('member/{member}', 'HouseholdController@index')->name('household');
});
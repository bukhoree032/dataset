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

Route::prefix('member')->name('member.')->group(function () {
    Route::get('login', 'MemberController@index')->name('login');
    Route::post('login', 'Auth\MemberLoginController@login')->name('login');
    Route::get('register', 'MemberController@register')->name('register');
    Route::post('register', 'MemberController@registerStore')->name('register');
    Route::post('logout', 'Auth\MemberLoginController@logout')->name('logout');
});

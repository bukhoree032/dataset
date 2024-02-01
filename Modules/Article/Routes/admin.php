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
    Route::resource('article', 'ArticleController', ['except' => ['show']]);
});

Route::prefix('article')->name('admin.article.')->group(function() {
    Route::get('search', 'ArticleController@search')->name('search');
    Route::get('report/pdf', 'ArticleController@index')->name('report-pdf');
    Route::get('report/setTemplate', 'ArticleController@index')->name('setTemplate');
});

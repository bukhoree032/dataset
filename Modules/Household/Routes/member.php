<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutehouseholdProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('member')->name('member.')->namespace('Member')->group(function () {
    Route::name('household.')->group(function () {
        Route::prefix('household')->group(function () {
            Route::get('/', 'HouseholdController@index')->name('index');

            Route::get('store/create', 'StoreController@create')->name('store.create');
            Route::post('store/create', 'StoreController@store')->name('store.store');
            Route::get('store/{store}/edit', 'StoreController@edit')->name('store.edit');
            Route::put('store/{store}/edit', 'StoreController@update')->name('store.update');
            Route::delete('store/{store}', 'StoreController@destroy')->name('store.destroy');

            Route::get('store/{store}/detail', 'StoreController@detail')->name('store.detail');

            Route::name('info.')->group(function () {
                Route::get('store/{store}/info/create', 'InfoController@create')->name('create');
                Route::post('store/{store}/info/create', 'InfoController@store')->name('store');
                Route::get('store/{store}/info/{info}/edit', 'InfoController@edit')->name('edit');
                Route::put('store/{store}/info/{info}/edit', 'InfoController@update')->name('update');

                Route::name('member.')->group(function () {
                    Route::get('store/{store}/info/{info}/member', 'MemberController@index')->name('index');
                    Route::post('store/{store}/info/{info}/member', 'MemberController@store')->name('store');
                    Route::get('store/{store}/info/{info}/member/{member}/edit', 'MemberController@edit')->name('edit');
                    Route::put('store/{store}/info/{info}/member/{member}/edit', 'MemberController@update')->name('update');

                    Route::get('store/{store}/info/{info}/member/{member}/step1', 'MemberController@step1')->name('step1');
                    Route::post('store/{store}/info/{info}/member/{member}/step1', 'MemberController@step1Save')->name('step1-save');
                    Route::get('store/{store}/info/{info}/member/{member}/step1/{step1}/edit', 'MemberController@step1edit')->name('step1_edit');
                    Route::put('store/{store}/info/{info}/member/{member}/step1/{step1}/edit', 'MemberController@step1update')->name('step1_update');
                    Route::get('store/{store}/info/{info}/member/{member}/step2', 'MemberController@step2')->name('step2');
                    Route::post('store/{store}/info/{info}/member/{member}/step2', 'MemberController@step2Save')->name('step2-save');
                    Route::get('store/{store}/info/{info}/member/{member}/step2/{step2}/edit', 'MemberController@step2edit')->name('step2_edit');
                    Route::put('store/{store}/info/{info}/member/{member}/step2/{step2}/edit', 'MemberController@step2update')->name('step2_update');
                });

                Route::name('econ.')->group(function () {
                    Route::get('store/{store}/info/{info}/econ/create', 'EconController@create')->name('create');
                    Route::post('store/{store}/info/{info}/econ/create', 'EconController@store')->name('store');
                    Route::get('store/{store}/info/{info}/econ/{econ}/edit', 'EconController@edit')->name('edit');
                    Route::put('store/{store}/info/{info}/econ/{econ}/edit', 'EconController@update')->name('update');
                });

                Route::name('enviro.')->group(function () {
                    Route::get('store/{store}/info/{info}/enviro/create', 'EnviroController@create')->name('create');
                    Route::post('store/{store}/info/{info}/enviro/create', 'EnviroController@store')->name('store');
                    Route::get('store/{store}/info/{info}/enviro/{enviro}/edit', 'EnviroController@edit')->name('edit');
                    Route::put('store/{store}/info/{info}/enviro/{enviro}/edit', 'EnviroController@update')->name('update');
                });

                Route::name('political.')->group(function () {
                    Route::get('store/{store}/info/{info}/political/create', 'PoliticalController@create')->name('create');
                    Route::post('store/{store}/info/{info}/political/create', 'PoliticalController@store')->name('store');
                    Route::get('store/{store}/info/{info}/political/{political}/edit', 'PoliticalController@edit')->name('edit');
                    Route::put('store/{store}/info/{info}/political/{political}/edit', 'PoliticalController@update')->name('update');
                });

                Route::name('communicat.')->group(function () {
                    Route::get('store/{store}/info/{info}/communicat/create', 'CommunicatController@create')->name('create');
                    Route::post('store/{store}/info/{info}/communicat/create', 'CommunicatController@store')->name('store');
                    Route::get('store/{store}/info/{info}/communicat/{communicat}/edit', 'CommunicatController@edit')->name('edit');
                    Route::put('store/{store}/info/{info}/communicat/{communicat}/edit', 'CommunicatController@update')->name('update');
                });
            });
        });
    });
});

//Route::middleware('member')->prefix('member')->name('member.household.')->group(function () {
//    Route::get('household', 'Member\HouseholdController@index')->name('index');
//    Route::get('household/show/{household}', 'Member\HouseholdController@show')->name('show');
//});
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

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/active', 'TaskController@active_list');
        Route::get('/create', 'TaskController@create');
        Route::post('/active', 'TaskController@store');
        Route::get('/edit/{task}', 'TaskController@edit');
        Route::put('/edit/{task}', 'TaskController@update');
        Route::delete('/active/{task}', 'TaskController@activedelete');
        Route::delete('/past/{task}', 'TaskController@pastdelete');
        Route::put('/active/{task}/status/{afterstatus}', 'TaskController@Changestatus');
        Route::get('/past', 'TaskController@past_list');
        Route::get('/record', 'TaskController@record_page');
    });
    
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
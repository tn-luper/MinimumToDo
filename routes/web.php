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
        
        //今日のタスクのページを表示
        Route::get('/', 'TaskController@active_list');
        
        //タスクの追加ページの表示
        Route::get('/create', 'TaskController@create');
        
        //新規タスクの登録
        Route::post('/active', 'TaskController@store');
        
        //タスクの編集ページの表示
        Route::get('/edit/{task}', 'TaskController@edit');
        
        //タスクの編集内容の保存
        Route::put('/edit/{task}', 'TaskController@update');
        
        //タスク（今日のタスク）の削除
        Route::delete('/active/{task}', 'TaskController@activedelete');
        
        //タスク（過去のタスク）の削除
        Route::delete('/past/{task}', 'TaskController@pastdelete');
        
        //タスクのステータスの変更
        Route::put('/active/{task}/status/{afterstatus}', 'TaskController@Changestatus');
        
        //過去のタスクの一覧のページを表示
        Route::get('/past', 'TaskController@past_list');
        
        //過去の達成率をグラフ化したページの表示
        Route::get('/record', 'TaskController@record_page');
    });
    
    Auth::routes();


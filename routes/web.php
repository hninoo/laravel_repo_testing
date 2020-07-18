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




	Route::get('/home', ['as' => 'home', 'uses' => 'TodoController@index']);
    Route::group(['prefix' => 'task'], function() {
        Route::get('/tasks',['as' => 'task.index', 'uses' => 'TodoController@index']);
        Route::post('/save', ['as' => 'task.save', 'uses' => 'TodoController@store']);
        Route::post('assign/',['as' => 'task.assign','uses' => 'TodoController@update']);
        Route::delete('/delete', ['as' => 'task.delete', 'uses' => 'TodoController@destroy']);

	});

    Route::get('todos','TodoController@index');
    Route::post('todo','TodoController@store');
    Route::get('todo/{id}','TodoController@show');


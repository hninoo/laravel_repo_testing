<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todos','TodoController@index');
Route::post('todo','TodoController@store');
Route::get('todo/{id}','TodoController@show');
Route::post('todo/update','TodoController@update');

Route::get('todo/delete/{id}','TodoController@delete');







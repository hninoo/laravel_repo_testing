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



Route::get('/', function () {
	return redirect()->route('login');
});
Auth::routes(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);
Route::group(['prefix' => 'control-panel', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::group(['prefix' => 'task'], function() {
		Route::post('/save', ['as' => 'task.save', 'uses' => 'TaskController@store']);

	});


});

Route::get('todos','TodoController@index');
Route::post('todo','TodoController@store');
Route::get('todo/{id}','TodoController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

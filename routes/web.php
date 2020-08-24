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

    Route::get('logout', function () {
        auth()->logout();
        Session()->flush();

        return redirect()->route('login');
    })->name('logout');

    Auth::routes();
    Route::get('/home', ['as' => 'control-panel/home', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => 'control-panel', 'middleware' => 'auth'], function () {
        Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::group(['prefix' => 'users'], function () {
            Route::get('users', ['as'=>'users.index','uses'=>'UserController@index']);
            Route::get('/create', ['as' => 'users.create' , 'uses' => 'UserController@create']);
            Route::post('save', ['as'=>'users.save','uses'=>'UserController@store']);
            Route::get('/edit', ['as' => 'users.edit' , 'uses' => 'UserController@edit']);
            Route::post('update', ['as'=>'users.update','uses'=>'UserController@update']);
            Route::delete('delete', ['as'=>'users.delete','uses'=>'UserController@destroy']);
        });
        Route::group(['prefix' => 'task'], function () {
            Route::get('/tasks', ['as' => 'task.index', 'uses' => 'TodoController@index']);
            Route::post('/save', ['as' => 'task.save', 'uses' => 'TodoController@store']);
            Route::post('assign/', ['as' => 'task.assign','uses' => 'TodoController@update']);
            Route::delete('/delete', ['as' => 'task.delete', 'uses' => 'TodoController@destroy']);
            Route::get('/export', ['as' => 'task.export','uses' => 'TodoController@todosExport']);
            Route::get('/generatepdf', ['as' => 'task.generatepdf','uses' => 'TodoController@generatePDF']);
            Route::get('/print', ['as'=>'task.print','uses' => 'TodoController@printPdf']);
        });
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/permission', ['as' => 'permission.index' , 'uses' => 'PermissionController@index']);
            Route::post('/save', ['as' => 'permission.save', 'uses' => 'PermissionController@store']);
            Route::patch('/update', ['as' => 'permission.update', 'uses' => 'PermissionController@update']);
            Route::delete('/delete', ['as' => 'permission.delete', 'uses' => 'PermissionController@destroy']);
        });
        Route::group(['prefix' => 'role'], function () {
            Route::get('/role', ['as' => 'role.index' , 'uses' => 'RoleController@index']);
            Route::get('/create', ['as' => 'role.create' , 'uses' => 'RoleController@create']);
            Route::post('/save', ['as' => 'role.save' , 'uses' => 'RoleController@store']);
            Route::get('/edit', ['as' => 'role.edit' , 'uses' => 'RoleController@edit']);
            Route::post('/update', ['as' => 'role.update' , 'uses' => 'RoleController@update']);
            Route::delete('/delete', ['as' => 'role.delete', 'uses' => 'RoleController@destroy']);
        });
    });

     Route::get('/test_cors', ['uses' => 'TestingController@testCors']);
     Route::get('test/cors', function () {
         return view('index');
     });

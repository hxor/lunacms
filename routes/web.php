<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => ['auth'], 'namespace' => 'Backend'], function(){
    Route::get('/', ['as' => 'backend', 'uses' => 'BackendController@index']);
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin', 'namespace' => 'Admin'], function(){
        Route::get('/', function(){
          return 'admin';
        });
        Route::resource('/category', 'CategoryController', ['names' => 'admin.category']);
        Route::resource('/post', 'PostController', ['names' => 'admin.post']);

        // Settings User
        Route::resource('/user', 'UserController', ['names' => 'admin.user']);
    });
});

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
Route::get('/', 'TasksController@index');
Route::resource('tasks','TasksController');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


// ユーザ機能
Route::group(['middleware' => 'auth'], function () {
Route::resource('users', 'UsersController', ['only' => ['index', 'show','store']]);
});

/*
Route::get('tasks/{id}','TasksController@show');
Route::post('tasks','TasksController@store');
Route::get('tasks/{id}','TasksController@supdate');
Route::delete('tasks/{id}','TasksController@destroy');

Route::get('tasks','TasksController@index')->name('tasks.index');
Route::get('tasks/{id}','TasksController@create')->name('tasks.create');
Route::get('tasks/{id}','TasksController@edit')->name('tasks.edit');
*/
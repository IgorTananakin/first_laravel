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

// Route::get('/', function () {
//     return view('welcome');
// });

/* Маршруты для задач */
Route::get('/', 'TaskController@index');
Route::post('/task', 'TaskController@create');
Route::delete('/task/{task}', 'TaskController@delete');
Route::get('/task/{task}', 'TaskController@show');
Route::post('/task/{task}', 'TaskController@update');

Route::post('/task/{task}/addgroup', 'TaskController@add_group');
Route::delete('/task/{task}/delgroup/{group}', 'TaskController@del_group');


/* Маршруты для статусов */
Route::get('/status', 'StatusController@index');
Route::post('/status', 'StatusController@create');
Route::delete('/status/{status}', 'StatusController@delete');
Route::get('/status/{status}', 'StatusController@show');
Route::post('/status/{status}', 'StatusController@update');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/* Маршруты для групп */
Route::get('/groups', 'GroupsController@index');
Route::post('/groups', 'GroupsController@create');
Route::delete('/groups/{group}', 'GroupsController@delete');
Route::get('/groups/{group}', 'GroupsController@show');
Route::post('/groups/{group}', 'GroupsController@update');

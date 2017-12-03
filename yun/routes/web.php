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
    return view('welcome');
});
//get/post/any 接值方式
Route::any('reg/login', 'RegController@login');
Route::any('reg/login_do', 'RegController@login_do');  
Route::any('reg/index', 'RegController@index');
Route::any('reg/add', 'RegController@add');  
Route::any('reg/show', 'RegController@show');  
Route::any('reg/deletes', 'RegController@deletes');  
Route::any('reg/updates', 'RegController@updates');  
Route::any('reg/upd', 'RegController@upd');


Route::any('logs/aa', 'LogsController@aa');
Route::any('logs/login', 'LogsController@login');
Route::any('logs/login_do', 'LogsController@login_do');  
Route::any('logs/index', 'LogsController@index');
Route::any('logs/add', 'LogsController@add');  
Route::any('logs/add_do', 'LogsController@add_do');  
Route::any('logs/show', 'LogsController@show'); 
Route::any('logs/show_do', 'LogsController@show_do');   
Route::any('logs/deletes', 'LogsController@deletes');  
Route::any('logs/updates', 'LogsController@updates');  
Route::any('logs/upd', 'LogsController@upd');
Route::any('logs/schedule', 'LogsController@schedule');
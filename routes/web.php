<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::resource('todo', 'TodoController');
Route::put('/todos/complete/{todo}', 'TodoController@complete')->name('todo.complete');
Route::put('/todos/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete');


//Todos
// Route::get('/todos', 'TodoController@index')->name('todo.index');
// Route::get('/todos/create', 'TodoController@create')->name('todo.create');
// Route::get('/todos/edit/{todo}', 'TodoController@edit')->name('todo.edit');
// Route::post('/todos', 'TodoController@store')->name('todo.store');
// Route::put('/todos/update/{todo}', 'TodoController@update')->name('todo.update');
// Route::delete('/todos/destroy/{todo}', 'TodoController@destroy')->name('todo.destroy');



Route::get('/', function () {
    return view('welcome');
});
Route::get('users/', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar')->name('upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

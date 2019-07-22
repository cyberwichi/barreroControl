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

Auth::routes();


Route::get('/fichar', 'HomeController@fichar')->name('fichar');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController' , ['except' => ['show', 'create', 'store']]);
Route::resource('/horarios', 'HorarioController');
Route::get('/turnodelete/{id}', 'HorarioController@destroy')->name('horario.delete');
Route::get('/userdelete/{id}', 'UserController@destroy')->name('user.delete');

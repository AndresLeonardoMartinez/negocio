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

Route::get('/productos', 'productoController@index');
Route::get('/productos/create', 'productoController@create');
Route::post('/productos', 'productoController@store');

Route::get('/categorias', 'categoriaController@index');
Route::get('/categorias/{id}', 'categoriaController@show');
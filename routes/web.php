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

Route::get('/', 'productoController@home');

Route::get('/productos/show', 'productoController@home');
Route::get('/productos', 'productoController@index');
Route::get('/productos/create', 'productoController@create');
Route::get('/productos/{id}', 'productoController@show');
Route::get('/productos/{id}/edit', 'productoController@edit');
Route::get('/productos/{cat}', 'productoController@getByCategoria');
Route::post('/productos', 'productoController@store');
Route::delete('/productos/{id}', 'productoController@destroy'); 
Route::patch('/productos/{id}', 'productoController@update'); 


Route::get('/categorias', 'categoriaController@index');
Route::get('/categorias/create', 'categoriaController@create');
Route::post('/categorias', 'categoriaController@store');
Route::get('/categorias/show', 'categoriaController@home');
Route::get('/categorias/{id}/edit', 'categoriaController@edit');
Route::delete('/categorias/{id}', 'categoriaController@destroy'); 
Route::patch('/categorias/{id}', 'categoriaController@update'); 

Route::get('/categorias/{id}', 'categoriaController@show');
Route::get('/categorias/{id}/get', 'categoriaController@get');
Auth::routes();

Route::get('/home',function () {
    return view ('productos.index');
});



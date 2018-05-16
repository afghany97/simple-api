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

Route::get('/books','BooksController@index');
Route::get('/books/{book}','BooksController@show');
Route::post('/books','BooksController@store');

Route::get('/categories','CategoiresController@index');
Route::get('/categories/{id}','CategoiresController@show');
Route::get('/books/{id}/categories','CategoiresController@index');

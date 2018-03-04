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
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use  GuzzleHttp\Psr7\Promise;

Route::get('/', 'ArticuloController@index');
Route::get('/delete{id}', 'ArticuloController@delete');
Route::get('/create', 'ArticuloController@create');
Route::get('/edit{id}', 'ArticuloController@edit');
Route::auth();

Auth::routes();
Route::get('/home', 'HomeController@index');

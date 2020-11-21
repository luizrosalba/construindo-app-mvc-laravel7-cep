<?php

use Illuminate\Support\Facades\Route;

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

// precisava passar o caminho completo 

Route::get('/', 'App\Http\Controllers\EnderecoController@index')->name('home');

Route::get('/adicionar', 'App\Http\Controllers\EnderecoController\EnderecoController@adicionar')->name('adicionar');

Route::get('/buscar', 'App\Http\Controllers\EnderecoController@buscar')->name('buscar');

Route::post('/salvar', 'App\Http\Controllers\EnderecoController@salvar')->name('salvar');


// // Route::get( '/', function () {
// //     return view('busca');
// });

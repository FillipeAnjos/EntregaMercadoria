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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'EntregaController@index')->name('index');

Route::post('/cadastrar', 'EntregaController@cadastrarEntrega');

Route::get('/listar', 'EntregaController@listarEntrega')->name('listar');

Route::get('/mapa', 'EntregaController@mapaEntrega')->name('mapa');

Route::get('/detalhesEntrega/{partida}/{destino}', 'EntregaController@detalhesEntrega')->name('detalhesEntrega');

/*
Route::group(['prefix' => 'menu'], function (){
     Route::get('contato', ['uses' => 'TrocaPageController@contato']);
     Route::get('servicos', ['uses' => 'TrocaPageController@servicos']);
     Route::get('nossaHistoria', ['uses' => 'TrocaPageController@nossaHistoria']);
     Route::get('filiado', ['uses' => 'TrocaPageController@filiado']);
                       
});
*/




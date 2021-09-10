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

use app\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'contatos');

Route::group(['prefix'=>'contatos', 'as'=>'contatos.'], function(){

    Route::get('/', 'ContatoController@index')->name( 'index');
    Route::get('criar', 'ContatoController@cadastro')->name('criar');
    Route::post('salvar', 'ContatoController@store')->name('salvar');
    Route::delete('remover/{id}', 'ContatoController@destroy')->name('excluir');
    Route::get('editar/{id}', 'ContatoController@edit')->name('editar');
    Route::post('editar/{id}', 'ContatoController@update')->name('atualizar');


});







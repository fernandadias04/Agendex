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

    Route::group(['prefix'=>'{contatoId}/notas', 'as'=>'notas.'], function(){

        Route::get('notas', 'NotaController@index')->name('notas');
        Route::get('criar', 'NotaController@cadastro')->name('criar');
        Route::post('criar', 'NotaController@store')->name('salvar');
        Route::get('editar/{id}', 'NotaController@edit')->name('editar');
        Route::post('editar/{id}', 'NotaController@update')->name('atualizar');
        Route::delete('remover/{id}', 'NotaController@destroy')->name('excluir');

    });



});

Route::get('editar-user', 'UserController@edit')->name('user.editar');
Route::post('editar-user', 'UserController@update')->name('user.atualizar');
Route::delete('remover-user', 'UserController@destroy')->name('user.delete');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');

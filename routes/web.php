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

Route::get('/','PaginaController@getIndex');

Route::get('noticias','PaginaController@getNoticias');

Route::get('noticia/{id}','PaginaController@getNoticiaIndividual');

Route::post('noticia/{id}','FormController@postComentario');

Route::get('juego/{id}','PaginaController@getJuego');

Route::get('torneos','PaginaController@getTorneos');

Route::get('torneo/{id}','PaginaController@getTorneoIndividual');

Route::get('tienda','PaginaController@getTienda');

Route::get('producto/{id}', 'PaginaController@getProducto');

Route::get('cesta','PaginaController@getCesta');


Route::get('cesta/update/{producto}/{cantidad?}',  [
    'as' => 'cart-update',
    'uses' => 'PaginaController@update']);

Auth::routes();

Route::post('registrar', 'PaginaController@registrarUsuario')->name('registrarUsuario');


Route::post('añadir', 'PaginaController@añadir')->name('añadir');


Route::delete('/cesta/eliminar/{id}', 'PaginaController@eliminar');


Route::get('jugador/{id}','PaginaController@getJugador');


Route::get('equipo/{id}','PaginaController@getEquipo');

Route::get('equipos','PaginaController@getTodosEquipos');

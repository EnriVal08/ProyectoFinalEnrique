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

Route::get('cesta','PaginaController@getCesta')->middleware('auth');


Route::get('cesta/update/{producto}/{cantidad?}',  [
    'as' => 'cart-update',
    'uses' => 'PaginaController@update'])->middleware('auth');

Auth::routes();

Route::post('registrar', 'PaginaController@registrarUsuario')->name('registrarUsuario');


Route::post('añadir', 'PaginaController@añadir')->name('añadir')->middleware('añadir-productos');


Route::delete('/cesta/eliminar/{id}', 'PaginaController@eliminar');


Route::get('jugador/{id}','PaginaController@getJugador');


Route::get('equipo/{id}','PaginaController@getEquipo');

Route::get('equipos','PaginaController@getTodosEquipos');

Route::get('jugadores','PaginaController@getTodosJugadores');

Route::get('comprar','PaginaController@getComprar')->middleware('auth')->middleware('comprobar');

Route::put('comprar','PaginaController@editarDireccion')->middleware('auth')->middleware('comprobar');

Route::post('añadir-direccion','PaginaController@añadirDireccion')->name('añadirDireccion')->middleware('auth');


//Paypal

Route::get('/paypal/pay', 'PagoController@pagarConPaypal')->middleware('auth')->middleware('comprobar')->middleware('existe-direccion');

Route::get('/paypal/status', 'PagoController@payPalStatus')->middleware('auth')->middleware('comprobar');

Route::get('/eliminar-cesta', 'PaginaController@eliminarCesta')->middleware('auth')->middleware('comprobar')->middleware('existe-direccion');

Route::get('/contrareembolso', 'PaginaController@getContrareembolso')->middleware('auth')->middleware('existe-direccion')->middleware('comprobar-compra');

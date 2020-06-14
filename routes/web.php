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

Route::post('registrar', 'UsuarioController@registrarUsuario')->name('registrarUsuario');


Route::post('añadir', 'AñadirController@añadir')->name('añadir')->middleware('añadir-productos');


Route::delete('/cesta/eliminar/{id}', 'PaginaController@eliminar');


Route::get('jugador/{id}','PaginaController@getJugador');


Route::get('equipo/{id}','PaginaController@getEquipo');

Route::get('equipos','PaginaController@getTodosEquipos');

Route::get('jugadores','PaginaController@getTodosJugadores');

Route::get('comprar','PaginaController@getComprar')->middleware('auth')->middleware('comprobar');

Route::put('comprar','EditarController@editarDireccion')->middleware('auth')->middleware('comprobar');

Route::post('añadir-direccion','AñadirController@añadirDireccion')->name('añadirDireccion')->middleware('auth');


//Paypal

Route::get('/paypal/pay', 'PagoController@pagarConPaypal')->middleware('auth')->middleware('comprobar')->middleware('existe-direccion')->name('paypal');

Route::get('/paypal/status', 'PagoController@payPalStatus')->middleware('auth')->middleware('comprobar');

Route::get('/eliminar-cesta', 'UsuarioController@eliminarCesta')->middleware('auth')->middleware('comprobar')->middleware('existe-direccion')->name('eliminar-cesta');

Route::get('/contrareembolso', 'PaginaController@getContrareembolso')->middleware('auth')->middleware('existe-direccion')->middleware('comprobar-compra');


Route::get('perfil','UsuarioController@getPerfil')->name('perfil')->middleware('auth');

Route::put('perfil','UsuarioController@modificarPerfil')->name('modificar-perfil')->middleware('auth');


Route::get('historialPedidos','PaginaController@getHistorialPedidos')->name('historial')->middleware('auth');



//Parte admin


/*Añadir*/
Route::post('añadir-juego','AñadirController@añadirJuego')->name('añadir-juego')->middleware('auth', 'rol');

Route::post('añadir-noticia','AñadirController@añadirNoticia')->name('añadir-noticia')->middleware('auth', 'rol');

Route::post('añadir-torneo','AñadirController@añadirTorneo')->name('añadir-torneo')->middleware('auth', 'rol');

Route::post('añadir-equipoAlTorneo','AñadirController@añadirEquipoAlTorneo')->name('añadir-equipoAlTorneo')->middleware('auth', 'rol');

Route::post('añadir-producto','AñadirController@añadirProducto')->name('añadir-producto')->middleware('auth', 'rol');


/*Editar*/

Route::put('editar-noticia','EditarController@editarNoticia')->name('editar-noticia')->middleware('auth', 'rol');

Route::put('editar-juego','EditarController@editarJuego')->name('editar-juego')->middleware('auth', 'rol');

Route::put('editar-torneo','EditarController@editarTorneo')->name('editar-torneo')->middleware('auth', 'rol');

Route::put('editar-equipo/{id}','EditarController@editarEquipo')->name('editar-equipo')->middleware('auth', 'rol');

Route::put('editar-jugador/{id}','EditarController@editarJugador')->name('editar-jugador')->middleware('auth', 'rol');

Route::put('editar-producto/{id}','EditarController@editarProducto')->name('editar-producto')->middleware('auth', 'rol');


/*Eliminar*/

Route::get('eliminar-noticia/{id}','EliminarController@eliminarNoticia')->name('eliminar-noticia')->middleware('auth', 'rol');

Route::get('eliminar-juego/{id}','EliminarController@eliminarJuego')->name('eliminar-juego')->middleware('auth', 'rol');

Route::get('eliminar-torneo/{id}','EliminarController@eliminarTorneo')->name('eliminar-torneo')->middleware('auth', 'rol');

Route::get('eliminar-equipoParticipante/{idequipo}/{idtorneo}','EliminarController@eliminarEquipoParticipante')->name('eliminar-equipoParticipante')->middleware('auth', 'rol');

Route::get('eliminar-equipo/{id}','EliminarController@eliminarEquipo')->name('eliminar-equipo')->middleware('auth', 'rol');

Route::get('eliminar-jugador/{id}','EliminarController@eliminarJugador')->name('eliminar-jugador')->middleware('auth', 'rol');

Route::get('eliminar-jugadorDelEquipo/{id}','EliminarController@eliminarJugadorDelEquipo')->name('eliminar-jugadorDelEquipo')->middleware('auth', 'rol');

Route::get('eliminar-producto/{id}','EliminarController@eliminarProducto')->name('eliminar-producto')->middleware('auth', 'rol');

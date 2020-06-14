<?php

namespace App\Http\Controllers;

use App\Direcciones;
use App\Equipo;
use App\Juego;
use App\Jugador;
use App\Noticia;
use App\Producto;
use App\Torneo;
use Illuminate\Http\Request;

class EditarController extends Controller
{
    public function editarDireccion(Request $request){

        $this->validate($request, [
            'pais' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);


        $direccion = Direcciones::find($request->input('id'));

        $direccion->pais = $request->input('pais');
        $direccion->provincia = $request->input('provincia');
        $direccion->alias = $request->input('alias');
        $direccion->nif = $request->input('nif');
        $direccion->nombre = $request->input('nombreD');
        $direccion->apellidos = $request->input('apellidos');
        $direccion->direccion = $request->input('direccion');
        $direccion->codigo_postal = $request->input('codigo_postal');
        $direccion->poblacion = $request->input('poblacion');
        $direccion->telefono = $request->input('telefono');


        $direccion->save();


        return redirect('comprar');
    }


    public function editarNoticia(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $noticia = Noticia::find($request->input('id_noticia'));

        $noticia->titulo = $request->tituloEditarNoticia;
        $noticia->descripcion = $request->descripcionEditarNoticia;
        $noticia->fecha = $request->fechaEditarNoticia;
        $noticia->foto = $request->fotoEditarNoticia;




        $noticia->save();

        return redirect()->back();


    }



    public function editarJuego(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $juego = Juego::find($request->input('id_juego'));

        $juego->nombre = $request->nombreEditarJuego;
        $juego->titulo = $request->tituloEditarJuego;
        $juego->descripcion = $request->descripcionEditarJuego;
        $juego->foto = $request->fotoEditarJuego;
        $juego->video = $request->videoEditarJuego;

        if ($request->file('logoEditarJuego') != NULL){
            $juego->logo = $request->file('logoEditarJuego')->move('images', $request->file('logoEditarJuego')->getClientOriginalName());
        }



        $juego->save();

        return redirect()->back();


    }



    public function editarTorneo(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $torneo = Torneo::find($request->input('id_torneo'));

        $torneo->titulo = $request->tituloEditarTorneo;
        $torneo->id_juego = $request->id_juegoEditar;
        $torneo->foto = $request->fotoEditarTorneo;
        $torneo->fecha = $request->fechaEditarTorneo;
        $torneo->ubicacion = $request->ubicacionEditarTorneo;
        $torneo->descripcion = $request->descripcionEditarTorneo;
        $torneo->premio = $request->premioEditarTorneo;
        $torneo->logo = $request->logoEditarTorneo;
        $torneo->link = $request->linkEditarTorneo;

        $torneo->save();

        return redirect()->back();


    }

    public function editarEquipo($id, Request $request){

        $equipo = Equipo::find($id);

        $equipo->nombre = $request->nombreEditarEquipo;
        $equipo->logo = $request->logoEditarTorneo;
        $equipo->pais = $request->paisEditarTorneo;
        $equipo->descripcion = $request->descripcionEditarTorneo;
        $equipo->fondo = $request->fondoEditarTorneo;

        $equipo->save();

        return redirect()->back();


    }

    public function editarJugador($id, Request $request){

        $jugador = Jugador::find($id);

        $jugador->nombre = $request->nombreEditarJugador;
        $jugador->nombre_completo = $request->nombreCompletoEditarJugador;
        $jugador->id_equipo = $request->id_equipoJugador;

        $jugador->edad = $request->edadEditarJugador;
        $jugador->pais = $request->paisEditarJugador;
        $jugador->descripcion = $request->descripcionEditarJugador;
        $jugador->fondo = $request->fondoEditarJugador;

        if ($request->file('imagenEditarJugador') != NULL){
            $jugador->foto = $request->file('imagenEditarJugador')->move('images', $request->file('imagenEditarJugador')->getClientOriginalName());
        }


        $jugador->save();

        return redirect()->back();


    }



    public function editarProducto($id, Request $request){

        $producto = Producto::find($id);

        $producto->nombre = $request->nombreEditarProducto;
        $producto->precio = $request->precioEditarProducto;
        $producto->foto = $request->fotoEditarProducto;
        $producto->categoria = $request->categoriaEditarProducto;
        $producto->descripcion = $request->descripcionEditarProducto;


        $producto->save();

        return redirect()->back();


    }


}

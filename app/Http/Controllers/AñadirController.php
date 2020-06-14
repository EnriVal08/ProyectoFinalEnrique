<?php

namespace App\Http\Controllers;

use App\Cesta;
use App\Direcciones;
use App\Juego;
use App\Noticia;
use App\Producto;
use App\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AñadirController extends Controller
{
    public function añadir(Request $request)
    {

        $id_usuario = auth()->id();

        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);

        $existe = false;
        foreach ($cesta as $productoCesta) {
            if ($productoCesta->id_producto == $request->id_producto) {

                $existe = true;

                $productoCesta->update([
                    'cantidad' => $productoCesta->cantidad + $request->input('cantidad'),
                ]);


            }
        }

        if ($existe) {

            flash('Producto añadido a tu cesta correctamente')->info();

            return redirect('/producto/' . $request->id_producto);


        } else {

            $productoNuevo = new Cesta();

            $productoNuevo->id_producto = $request->id_producto;
            $productoNuevo->id_usuario = $id_usuario;
            $productoNuevo->cantidad = $request->cantidad;

            $productoNuevo->save();

            flash('Producto añadido a tu cesta correctamente')->info();

            return redirect('/producto/' . $request->id_producto);

        }




    }

    public function añadirDireccion(Request $request){

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


        $direccion = new Direcciones();

        $direccion->pais = $request->pais;
        $direccion->id_usuario = auth()->id();
        $direccion->provincia = $request->provincia;
        $direccion->alias = $request->alias;
        $direccion->nif = $request->nif;
        $direccion->nombre = $request->nombreD;
        $direccion->apellidos = $request->apellidos;
        $direccion->direccion = $request->direccion;
        $direccion->codigo_postal = $request->codigo_postal;
        $direccion->poblacion = $request->provincia;
        $direccion->telefono = $request->telefono;



        $direccion->save();

        return redirect('comprar');


    }


    public function añadirJuego(Request $request){

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

        $juego = new Juego();

        $juego->nombre = $request->nombreJuego;
        $juego->titulo = $request->tituloJuego;
        $juego->descripcion = $request->descripcionJuego;
        $juego->foto = $request->fotoJuego;
        $juego->video = $request->videoJuego;

        if ($request->file('logoJuego') != NULL){
            $juego->logo = $request->file('logoJuego')->move('images', $request->file('logoJuego')->getClientOriginalName());
        }


        $juego->save();

        return redirect('/');


    }

    public function añadirNoticia(Request $request){

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

        $noticia = new Noticia();

        $noticia->titulo = $request->tituloNoticia;
        $noticia->descripcion = $request->descripcionNoticia;
        $noticia->fecha = $request->fechaNoticia;
        $noticia->foto = $request->fotoNoticia;

        $noticia->id_creador = auth()->id();



        $noticia->save();

        return redirect('/');


    }


    public function añadirTorneo(Request $request){

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

        $torneo = new Torneo();

        $torneo->titulo = $request->tituloTorneo;
        $torneo->id_juego = $request->id_juego;
        $torneo->foto = $request->fotoTorneo;
        $torneo->fecha = $request->fechaTorneo;
        $torneo->ubicacion = $request->ubicacionTorneo;
        $torneo->descripcion = $request->descripcionTorneo;
        $torneo->premio = $request->premioTorneo;
        $torneo->logo = $request->logoTorneo;
        $torneo->link = $request->linkTorneo;

        $torneo->save();

        return redirect('/');


    }

    public function añadirEquipoAlTorneo(Request $request){


        DB::table('equipos_juegan_torneos')->insert([
            ['id_torneo' =>  $request->input('id_torneo'), 'id_equipo' => $request->input('id_equipo')]
        ]);

        return redirect()->back();


    }

    public function añadirProducto(Request $request){

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

        $producto = new Producto();

        $producto->nombre = $request->nombreProducto;
        $producto->precio = $request->precioProducto;
        $producto->foto = $request->fotoProducto;
        $producto->descripcion = $request->descripcionProducto;
        $producto->categoria = $request->categoriaProducto;

        $producto->save();

        return redirect('/');


    }
}

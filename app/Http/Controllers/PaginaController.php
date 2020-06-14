<?php

namespace App\Http\Controllers;

use App\Cesta;
use App\Comentario;
use App\Direcciones;
use App\Equipo;
use App\Juego;
use App\Jugador;
use App\Noticia;
use App\Pedidos;
use App\Producto;
use App\Torneo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use function GuzzleHttp\Promise\all;

class PaginaController extends Controller
{
    public function getIndex()
    {
        $juegos = Juego::all();

        /*Para poner el primer juego como active en el carousel*/
        $primerJuego = Juego::first();

        $noticias = Noticia::take(3)->orderby('id', 'DESC')->get();

        $torneos = Torneo::all();

        return view('pagina.index')->with(compact('juegos'))->with('primerJuego', $primerJuego)->with(compact('noticias'))->with(compact('torneos'));
    }

    public function getNoticias()
    {

        $noticias = Noticia::paginate(4);
        $ultimas_noticias = Noticia::take(5)->orderby('id', 'DESC')->get();

        return view('pagina.noticias')->with(compact('noticias'))->with(compact('ultimas_noticias'));
    }

    public function getNoticiaIndividual($id)
    {

        $noticia = Noticia::findOrFail($id);


        $autor = Noticia::find($noticia->id_creador)->usuario;

        return view('pagina.noticiaindividual', array('noticia' => $noticia), array('autor' => $autor));
    }


    public function getJuego($id)
    {


        $juego = Juego::findOrFail($id);


        return view('pagina.juego', array('juego' => $juego));
    }

    public function getTorneos()
    {


        $torneos = Torneo::all();


        return view('pagina.torneos')->with(compact('torneos'));
    }


    public function getTorneoIndividual($id)
    {

        $torneo = Torneo::findOrFail($id);


        return view('pagina.torneoindividual', array('torneo' => $torneo));
    }

    public function getTienda()
    {

        $productos = Producto::paginate(3);

        return view('pagina.tienda')->with(compact('productos'));


    }

    public function getProducto($id)
    {

        $producto = Producto::findOrFail($id);

        return view('pagina.detallesproducto', array('producto' => $producto));
    }


    public function getCesta()
    {

        $id_usuario = auth()->id();


        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);


        $total = $this->total();




        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


        $fecha = Carbon::now();


        /*Fecha inicial envío*/


        $suma = $fecha->addDay(5);

        $mes = $meses[($suma->format('n')) - 1];

        $envio = $suma->format('d') . ' de ' . $mes;


        /*Fecha límite envío*/

        $suma2 = $fecha->addDay(8);

        $mes2 = $meses[($suma2->format('n')) - 1];

        $envio2 = $suma2->format('d') . ' de ' . $mes2;


        /*Fechas tiempo de envío estimado*/

        $envioFinal = $envio . ' - ' . $envio2;

        return view('pagina.cesta', array('cesta' => $cesta), compact('total', 'envioFinal'));


    }


    public function update($producto, $cantidad)
    {

        $cesta = Cesta::find($producto);

        $cesta->cantidad = $cantidad;

        $cesta->save();

        return redirect('cesta');

    }


    public function total()
    {

        $id_usuario = auth()->id();


        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);


        $total = 0;

        foreach ($cesta as $productos) {
            foreach ($productos->productos as $producto) {
                $total += $producto->precio * $productos->cantidad;
            }
        }

        return $total;
    }




    public function eliminar($id)
    {


        $cesta = Cesta::findOrFail($id);


        $cesta->delete();
        return redirect('/cesta');


    }


    public function getJugador($id)
    {

        $jugador = Jugador::findOrFail($id);


        $equipo = Jugador::find($jugador->id)->equipo;


        return view('pagina.jugador', array('jugador' => $jugador), array('equipo' => $equipo));


    }


    public function getEquipo($id){

            $equipos = Equipo::findOrFail($id);


            return view('pagina.equipos', array('equipo' => $equipos));


    }

    public function getTodosEquipos(){

        $equipos = Equipo::all();

        return view('pagina.todosequipos', array('equipos' => $equipos));



    }

    public function getTodosJugadores(){

        $jugadores = Jugador::paginate(9);

        return view('pagina.todosjugadores', array('jugadores' => $jugadores));



    }


    public function getComprar(){

        $id_usuario = auth()->id();


        $direccion = DB::table('direcciones')
            ->where('id_usuario', $id_usuario)
            ->first();

        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);

        $total = $this->total();

        return view('pagina.comprar', array('direccion' => $direccion), array('cesta' => $cesta))->with(compact('total'));

    }





    public function getContrareembolso(){
        $id_usuario = auth()->id();

        $direccion = DB::table('direcciones')
            ->where('id_usuario', $id_usuario)
            ->first();
        $cesta = session('productos');


        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


        $fecha = Carbon::now();


        /*Fecha inicial envío*/


        $suma = $fecha->addDay(5);

        $mes = $meses[($suma->format('n')) - 1];

        $envio = $suma->format('d') . ' de ' . $mes;

        return view('pagina.contrareembolso', array('direccion' => $direccion), array('cesta' => $cesta))->with(compact('envio'));
    }






    public function getHistorialPedidos(){


        $pedidos = Pedidos::where('id_cliente', '=', auth()->id())->paginate(1);

        return view('pagina.historialPedidos')->with(compact( 'pedidos'));

    }














}



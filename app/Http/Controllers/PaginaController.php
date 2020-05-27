<?php

namespace App\Http\Controllers;

use App\Cesta;
use App\Comentario;
use App\Juego;
use App\Noticia;
use App\Producto;
use App\Torneo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class PaginaController extends Controller
{
    public function getIndex(){
        $juegos=Juego::all();

        $primerJuego=Juego::find(1);

        $noticias=Noticia::take(3)->orderby('id', 'DESC')->get();

        $torneos=Torneo::all();

        return view('pagina.index')->with(compact('juegos'))->with('primerJuego',$primerJuego)->with(compact('noticias'))->with(compact('torneos'));
    }

    public function getNoticias(){

        $noticias=Noticia::all();
        $ultimas_noticias=Noticia::take(5)->orderby('id', 'DESC')->get();

        return view('pagina.noticias')->with(compact('noticias'))->with(compact('ultimas_noticias'));
    }

    public function getNoticiaIndividual($id){

        $noticia = Noticia::findOrFail($id);



        $autor = Noticia::find($noticia->id_creador)->usuario;

        return view('pagina.noticiaindividual', array('noticia'=>$noticia), array('autor'=>$autor));
    }


    public function getJuego($id){


        $juego = Juego::findOrFail($id);


        return view('pagina.juego', array('juego'=>$juego));
    }

    public function getTorneos(){


       $torneos=Torneo::all();


        return view('pagina.torneos')->with(compact('torneos'));
    }


    public function getTorneoIndividual($id){

        $torneo = Torneo::findOrFail($id);

        $juego = Torneo::find($torneo->id_juego)->juego;


        return view('pagina.torneoindividual', array('torneo'=>$torneo), array('juego'=>$juego));
    }

    public function getTienda(){

        $productos = Producto::all();

        return view('pagina.tienda')->with(compact('productos'));



    }

    public function getProducto($id){

        $producto = Producto::findOrFail($id);

        return view('pagina.detallesproducto', array('producto'=>$producto));
    }


    public function getCesta(){

        $cesta = Cesta::all()->where('id_usuario', '=', '1');


        $total = $this->total();

        return view('pagina.cesta', array('cesta'=>$cesta), compact('total'));


    }



    public function update($producto, $cantidad){

        $cesta = Cesta::find($producto);

        $cesta->cantidad = $cantidad;

        $cesta->save();

        return redirect('cesta');

    }





    private function total(){

        $cesta = Cesta::all()->where('id_usuario', '=', '1');




        $total = 0;

        foreach($cesta as $productos){
            foreach($productos->productos as $producto){
                $total += $producto->precio * $productos->cantidad;
            }
        }

        return $total;
    }

}

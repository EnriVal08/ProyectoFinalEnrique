<?php

namespace App\Http\Controllers;

use App\Juego;
use App\Noticia;
use App\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{
    public function getIndex(){
        $juegos=Juego::all();

        $primerJuego=Juego::find(1);

        $noticias=Noticia::all();

        $torneos=Torneo::all();

        return view('pagina.index')->with(compact('juegos'))->with('primerJuego',$primerJuego)->with(compact('noticias'))->with(compact('torneos'));
    }
}

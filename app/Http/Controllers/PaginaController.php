<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{
    public function getIndex(){
        $juego=DB::select('select * from juegos');
        return view('pagina.index', array('juegos'=>$juego));
    }
}

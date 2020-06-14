<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Equipo;
use App\Juego;
use App\Jugador;
use App\Noticia;
use App\Producto;
use App\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarController extends Controller
{
    public function eliminarJugadorDelEquipo($id){


        $jugador = Jugador::where('id', $id)->update(['id_equipo' => NULL]);


        return redirect('torneos');


    }




    public function eliminarProducto($id){


        $producto = Producto::find($id)->delete();


        return redirect('tienda');

    }




    public function eliminarEquipo($id){


        $equipo = Equipo::find($id);

        DB::delete('delete from equipos_juegan_torneos where id_equipo = '.$id);

        $jugadores = Jugador::where('id_equipo', $id)->update(['id_equipo' => NULL]);;


        $equipo->delete();

        return redirect('torneos');


    }



    public function eliminarJugador($id){


        $jugador = Jugador::find($id);


        $jugador->delete();

        return redirect('torneos');


    }

    public function eliminarTorneo($id){


        $torneo = Torneo::find($id);


        $equipos_juegan_torneos = DB::delete('delete from equipos_juegan_torneos where id_torneo = '.$torneo->id);


        $torneo->delete();

        return redirect('torneos');


    }







    public function eliminarEquipoParticipante($idequipo, $idtorneo){



        DB::delete('delete from equipos_juegan_torneos where id_equipo = '.$idequipo.' AND id_torneo = '. $idtorneo);



        return redirect()->back();


    }


    public function eliminarNoticia($id){


        $noticia = Noticia::find($id);

        $comentarios = Comentario::where('id_noticia', $id)->delete();

        $noticia->delete();

        return redirect('noticias');


    }


    public function eliminarJuego($id){


        $juego = Juego::find($id);


        $torneoJuego = $juego->torneo;

        if ($torneoJuego != NULL){
            return redirect('/');
        }


        $juego->delete();

        return redirect('/');


    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "equipos";


    public function jugadores(){
        return $this->hasMany('App\Jugador', 'id_equipo');
    }

    public function torneos(){
        return $this->belongsToMany('App\Torneo', 'equipos_juegan_torneos', 'id_equipo', 'id_torneo');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "equipos";


    public function jugadores(){
        return $this->hasMany('App\Jugador', 'id_equipo');
    }

}

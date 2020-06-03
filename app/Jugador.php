<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = "jugadores";

    public function equipo(){
        return $this->hasOne('App\Equipo', 'id', 'id_equipo');
    }
}

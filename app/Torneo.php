<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = "torneos";

    public function juego (){
        return $this->hasOne('App\Juego', 'id');
    }

    public function equipos(){
        return $this->belongsToMany('App\Equipo', 'equipos_juegan_torneos', 'id_torneo', 'id_equipo');
    }
}

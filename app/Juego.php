<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $table = "juegos";

    public function torneo(){
        return $this->hasOne('App\Torneo', 'id_juego', 'id');
    }
}

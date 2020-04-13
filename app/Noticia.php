<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = "noticias";

    public function users(){
        return $this->hasOne('App\User', 'id_creador');
    }

    public
}

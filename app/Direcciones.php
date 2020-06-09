<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = "direcciones";

    public function usuario(){
        return $this->hasOne('App\User',  'id_usuario');
    }

}

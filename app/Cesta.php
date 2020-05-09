<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    protected $table = "cesta";

    public function producto(){
        return $this->hasMany('App\Producto', 'id_producto');
    }

    public function usuario(){
        return $this->hasOne('App\User', 'id_usuario');
    }
}

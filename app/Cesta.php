<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    protected $table = "cesta";

    public function productos(){
        return $this->hasMany('App\Producto', 'id', 'id_producto');
    }


    public function usuario(){
        return $this->hasOne('App\User', 'id');
    }
}

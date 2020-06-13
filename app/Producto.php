<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    public function pedido(){
        return $this->belongsToMany('App\Pedidos', 'historial_pedidos', 'id_producto', 'id_pedido');
    }

}

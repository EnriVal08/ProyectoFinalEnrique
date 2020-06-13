<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{

    protected $table = "pedidos";


    public function usuario(){
        return $this->hasOne('App\User', 'id', 'id_cliente');
    }

    public function productosPedido(){
        return $this->belongsToMany('App\Producto', 'historial_pedidos', 'id_pedido', 'id_producto')->withPivot('cantidad'); ;
    }
}

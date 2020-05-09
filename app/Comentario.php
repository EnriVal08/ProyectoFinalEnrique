<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";

    public function noticia(){
        return $this->hasOne('App\Noticia', 'id_noticia');
    }

    public function usuario(){
        return $this->hasOne('App\User',  'id_usuario');
    }
}

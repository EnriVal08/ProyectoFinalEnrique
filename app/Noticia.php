<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    public function usuario(){
        return $this->hasOne('App\User', 'id');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario', 'id_noticia');
    }

    public function fotos(){
        return $this->hasMany('App\Galeria', 'id_noticia');
    }

}

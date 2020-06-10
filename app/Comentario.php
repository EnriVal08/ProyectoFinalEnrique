<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";

    public function noticia(){
        return $this->hasOne('App\Noticia', 'id_noticia');
    }

    public function usuario($email){

        $usuarios = User::all();

        foreach ($usuarios as $usuario){
            if ($usuario->email == $email){
                return $usuario->avatar;
            }
        }

        return 'images/avatarDefault.png';
    }
}

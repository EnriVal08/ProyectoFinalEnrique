<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function postComentario(Request $request){


            $comentario = new Comentario();
            $comentario->descripcion = $request->input('texto');
            $comentario->id_noticia = $request->input('idNoticia');
            $comentario->nombre_usuario = $request->input('nombre');
            $comentario->email_usuario = $request->input('email');

            $comentario->save();


            return redirect('/noticia/'.$request->input('idNoticia'));

    }
}

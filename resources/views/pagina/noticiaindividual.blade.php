@extends('layouts.master')
@section('content')


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="noticia-individual">
        <div class="container articulo">
            <figure class="caja-figura">
                <img class="img-fluid" src="{{$noticia->foto}}">
            </figure>

            @if(Auth::check())


                @if(auth()->user()->rol == 'admin')

                <div class="row">
                    <div class="col mt-3"  align="center" style="color: white">
                        <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarNoticia" style="display:inline">
                            <i class="fas fa-edit"></i>
                            Editar noticia
                        </a>
                    </div>
                    <div class="col mt-3"  align="center" style="color: white">
                        <a type="button" href="{{url('eliminar-noticia/'.$noticia->id)}}" class="boton-añadir" style="display:inline">
                            <i class="fas fa-trash-alt"></i>
                            Eliminar noticia
                        </a>
                    </div>
                </div>


                @endif

            @endif
            <div class="wrapper">
                <div class="redes-sociales">
                    <ul class="lista-redes">
                        <li class="social">
                            <a href="#" class="fab fa-twitter"></a>
                        </li>
                        <li class="social">
                            <a href="#" class="fab fa-facebook-f"></a>
                        </li>
                        <li class="social">
                            <a href="#" class="fab fa-instagram"></a>
                        </li>
                    </ul>
                </div>
                <div class="contenido-noticia">
                    <h1 class="titulo-post">{{$noticia->titulo}}</h1>
                    <span class="detalles-post">Publicado por <span class="autor">{{$autor->nombre}}</span> el {{$noticia->fecha}}</span>

                    <p class="text-justify">
                        {!! nl2br(e($noticia->descripcion), false) !!}
                    </p>

                @foreach($noticia->fotos as $foto)
                        <img class="img-fluid z-depth-4" width="800px" src="{{$foto->foto}}" alt="Generic placeholder image">
                    @endforeach
                </div>
            </div>




        </div>
    </section>

    <section class="comentarios">
        <div class="container">
            <div class="m-3">
                <h4>{{($noticia->comentarios)->count()}} comentarios <a class="btn purple-gradient" data-toggle="modal" data-target="#modalContactForm">Añade el tuyo</a>
                </h4>
            </div>

            <ul class="list-unstyled">
                @foreach($noticia->comentarios as $comentario)
                    <li class="media m-3 mb-5">
                        <img class="d-flex mr-3" width="80px"  height="80px" src="{{asset($comentario->usuario($comentario->email_usuario))}}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 font-weight-bold">{{$comentario->nombre_usuario}}</h5>
                            {{$comentario->descripcion}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <form method="POST" action="">

        {{csrf_field()}}

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Comentario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="nombre" name="nombre" class="form-control validate" @if(Auth::check()) value="{{auth()->user()->nombre}}"  readonly @endif required>
                            <label data-error="wrong" data-success="right" for="nombre">Nombre</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="email" name="email" class="form-control validate" @if(Auth::check()) value="{{auth()->user()->email}}" readonly  @endif required>
                            <label data-error="wrong" data-success="right" for="email">Email</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="texto" name="texto" class="md-textarea form-control" rows="4" required></textarea>
                            <label data-error="wrong" data-success="right" for="texto">Comentario</label>
                        </div>

                        <input type="hidden" name="idNoticia" value="{{$noticia->id}}">

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn purple-gradient">Publicar <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="{{route('editar-noticia')}}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal fade" id="modalEditarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Editar Noticia</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3 ">
                        <div class="md-form mb-5 mt-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="tituloEditarNoticia" name="tituloEditarNoticia" class="md-textarea form-control mt-3" rows="2" required>{{$noticia->titulo}}</textarea>
                            <label data-error="wrong" data-success="right" for="tituloEditarNoticia">Titulo</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="descripcionEditarNoticia" name="descripcionEditarNoticia" class="md-textarea form-control mt-4" rows="4" required>{{$noticia->descripcion}}</textarea>
                            <label data-error="wrong" data-success="right" for="descripcionEditarNoticia">Descripción</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fechaEditarNoticia" name="fechaEditarNoticia" class="form-control validate mt-4" value="{{$noticia->fecha}}" required>
                            <label data-error="wrong" data-success="right" for="fechaEditarNoticia">Fecha (Ej: 04 de mayo de 2020)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fotoEditarNoticia" name="fotoEditarNoticia" class="form-control validate mt-4" value="{{$noticia->foto}}" required>
                            <label data-error="wrong" data-success="right" for="fotoEditarNoticia">Foto (url de la foto)</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="reset" class="btn purple-gradient-rgba" value="Restablecer valores">
                        <button type="submit" class="btn purple-gradient">Editar Noticia <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                    <input type="hidden" name="id_noticia"  id="id_noticia" value="{{$noticia->id}}">
                </div>
            </div>
        </div>
    </form>

@endsection



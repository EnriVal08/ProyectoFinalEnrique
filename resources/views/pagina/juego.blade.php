@extends('layouts.master')
@section('content')


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="noticia-individual">
        <div class="container articulo">
            <figure class="caja-figura">
                <img class="img-fluid" src="{{$juego->foto}}">
            </figure>


            @if(Auth::check())

                @if(auth()->user()->rol == 'admin')

                    <div class="row">
                        <div class="col mt-3"  align="center" style="color: white">
                            <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarJuego" style="display:inline">
                                <i class="fas fa-edit"></i>
                                Editar juego
                            </a>
                        </div>
                        @if($juego->torneo != NULL)
                            <div class="col mt-3"  align="center" style="color: black">
                                <button type="button" class="boton-añadir" style="display:inline" disabled>
                                    <i class="fas fa-trash-alt"></i>
                                    Eliminar juego
                                </button>
                                <br><br>
                                <span>No puedes eliminar el juego porque pertenece a un torneo activo</span>

                            </div>

                        @else
                            <div class="col mt-3"  align="center" style="color: white">
                                <a type="button" href="{{url('eliminar-juego/'.$juego->id)}}" class="boton-añadir" style="display:inline" >
                                    <i class="fas fa-trash-alt"></i>
                                    Eliminar juego
                                </a>
                            </div>
                        @endif
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
                    <h1 class="titulo-post">{{$juego->titulo}}</h1>

                    <p class="text-justify">
                        {!! nl2br(e($juego->descripcion), false) !!}
                    </p>
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="{{$juego->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>



        </div>
    </section>

    <form method="POST" action="{{route('editar-juego')}}" enctype="multipart/form-data">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal fade" id="modalEditarJuego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Juego</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="nombreEditarJuego" name="nombreEditarJuego" class="form-control validate mt-4" value="{{$juego->nombre}}"required>
                            <label data-error="wrong" data-success="right" for="nombreEditarJuego">Nombre</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="tituloEditarJuego" name="tituloEditarJuego" class="form-control validate mt-4" value="{{$juego->titulo}}" required>
                            <label data-error="wrong" data-success="right" for="tituloEditarJuego">Título</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="descripcionEditarJuego" name="descripcionEditarJuego" class="md-textarea form-control mt-4" rows="3" required>{{$juego->descripcion}}</textarea>
                            <label data-error="wrong" data-success="right" for="descripcionEditarJuego">Descripción</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fotoEditarJuego" name="fotoEditarJuego" class="form-control validate mt-4" value="{{$juego->foto}}" required>
                            <label data-error="wrong" data-success="right" for="fotoEditarJuego">Foto (url de la foto)</label>
                        </div>


                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="videoEditarJuego" name="videoEditarJuego" class="form-control validate mt-4" value="{{$juego->video}}" required>
                            <label data-error="wrong" data-success="right" for="videoEditarJuego">Vídeo (Ej: https://www.youtube.com/embed/o84Y_cSjVyE)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <span class="pl-4 ml-3">Logo</span>
                            <br>
                            <input type="file" name="logoEditarJuego">
                        </div>

                    </div>
                    <input type="hidden" name="id_juego" id="id_juego" value="{{$juego->id}}">
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="reset" class="btn purple-gradient-rgba" value="Restablecer valores">
                        <button type="submit" class="btn purple-gradient">Editar Juego <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

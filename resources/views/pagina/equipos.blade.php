@extends('layouts.master')
@section('content')


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
</section>

<section class="torneos">

    <div class="container articulo">

        <div class="caja-figura img-torneo equipo-fondo" style="background-image: url('{{$equipo->fondo}}')">

        </div>

        <div class="caja-torneoindividual">
            <article class="torneo-arriba equipos-logo">
                <div class="col mr-auto detalles-jugador">
                    <ul>
                        <li>
                            <figure>
                                <img class="logo-torneo" src="{{$equipo->logo}}">
                            </figure>
                        </li>
                        <li>
                            <div class="col right">
                                 <span class="etiqueta">
                                {{$equipo->nombre}}
                            </span>
                                <span class="nombre">
                                {{$equipo->pais}}
                            </span>
                            </div>
                        </li>
                    </ul>
                </div>


            </article>

            <article class="torneo-abajo equipos-logo">
                <div class="col left textarea">
                    <div class="textarea-head mb-20">
                        <h4>
                            Sobre el equipo
                        </h4>
                    </div>
                    <div>
                        <p>
                            {{$equipo->descripcion}}</p>
                    </div>
                </div>
                <div class="align-items-center premio">
                    <div class="col right">
                        <figure>
                            @foreach($equipo->torneos as $torneo)
                                <img class="logo-torneo" src="{{$torneo->logo}}">
                            @endforeach
                        </figure>
                    </div>
                </div>
            </article>
        </div>

        @if(Auth::check())

            @if(auth()->user()->rol == 'admin')

                <div class="row">
                    <div class="col mt-3"  align="center" style="color: white">
                        <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarEquipo" style="display:inline">
                            <i class="fas fa-edit"></i>
                            Editar Equipo
                        </a>
                    </div>
                    <div class="col mt-3"  align="center" style="color: white">
                        <a type="button" href="{{url('eliminar-equipo/'.$equipo->id)}}" class="boton-añadir" style="display:inline">
                            <i class="fas fa-trash-alt"></i>
                            Eliminar Equipo
                        </a>
                    </div>
                </div>


            @endif
        @endif

    </div>




    <div class="container articulo mt-5">
        <div class="header-seccion border-bottom">
            <div class="titulo-seccion">
                <h2>Jugadores</h2>
            </div>
        </div>
        <div class="">
            <ul class="card-list">
                @foreach($equipo->jugadores as $jugador)

                <li class="card">
                    <figure><img src="{{asset($jugador->foto)}}"></figure>
                    <div class="card-info">
                        <h4 class="title">{{$jugador->nombre}}</h4>
                        <span class="card-subtitle">{{$jugador->pais}}</span>

                        @if(Auth::check())

                            @if(auth()->user()->rol == 'admin')

                                <a type="button" href="{{url('eliminar-jugadorDelEquipo/'.$jugador->id)}}" class="boton-añadir mt-4"  style="display:inline; height: 50px; font-size: 14px">
                                    <i class="fas fa-trash-alt"></i>
                                    Quitar jugador del equipo
                                </a>

                            @endif
                        @endif


                        <a class="botonTorneo" href="{{ url('/jugador/' . $jugador->id ) }}">Perfil</a>
                    </div>
                </li>


                @endforeach

            </ul>
        </div>
    </div>

</section>


    <form method="POST" action="{{url('editar-equipo/'.$equipo->id)}}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal fade" id="modalEditarEquipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Editar Equipo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="nombreEditarEquipo" name="nombreEditarEquipo" class="form-control validate mt-3" value="{{$equipo->nombre}}" required>
                            <label data-error="wrong" data-success="right" for="nombreEditarEquipo">Nombre</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="logoEditarTorneo" name="logoEditarTorneo" class="form-control validate mt-3" value="{{$equipo->logo}}" required>
                            <label data-error="wrong" data-success="right" for="logoEditarTorneo">Logo (url de la foto)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="paisEditarTorneo" name="paisEditarTorneo" class="form-control validate mt-3" value="{{$equipo->pais}}" required>
                            <label data-error="wrong" data-success="right" for="paisEditarTorneo">País</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="descripcionEditarTorneo" name="descripcionEditarTorneo" class="md-textarea form-control mt-3 mb-5" rows="3" required>{{$equipo->descripcion}}</textarea>
                            <label data-error="wrong" data-success="right" for="descripcionEditarTorneo">Descripción</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fondoEditarTorneo" name="fondoEditarTorneo" class="form-control validate mt-3" value="{{$equipo->fondo}}" required>
                            <label data-error="wrong" data-success="right" for="fondoEditarTorneo">Fondo (url de la foto)</label>
                        </div>


                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="reset" class="btn purple-gradient-rgba" value="Restablecer valores">
                        <button type="submit" class="btn purple-gradient">Editar Equipo <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                    <input type="hidden" name="id_equipo"  id="id_equipo" value="{{$equipo->id}}">
                </div>
            </div>
        </div>
    </form>

@endsection

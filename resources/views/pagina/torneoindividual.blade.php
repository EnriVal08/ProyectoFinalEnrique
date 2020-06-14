@extends('layouts.master')
@section('content')


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="torneos">

        <div class="container articulo">

            <div class="caja-figura img-torneo" style="background-image: url('{{$torneo->foto}}')">
                <div class="info-torneo">
                    <figure>
                        <img src="{{$torneo->logo}}" alt="Grandmasters Hearthstone">
                    </figure>
                    <div class="detalles-torneo">
                        <span>
                            {{$torneo->titulo}}
                        </span>
                        <ul>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                {{$torneo->ubicacion}}
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                {{$torneo->fecha}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="caja-torneoindividual">
                <article class="torneo-arriba">
                    <div class="col mr-auto">
                        <figure>
                            <img class="logo-torneo" src="{{asset($torneo->juego->logo)}}">
                        </figure>
                    </div>
                    <div class="premio">
                        <div class="col right">
                            <a href="{{$torneo->link}}" target="_blank" class="btn btn-black">Más información</a>

                        </div>
                    </div>
                </article>

                <article class="torneo-abajo">
                    <div class="col left textarea">
                        <div class="textarea-head mb-20">
                            <h4>
                                Sobre el torneo
                            </h4>
                        </div>
                        <div>
                            <p>
                                {{$torneo->descripcion}}</p>
                        </div>
                    </div>
                    <div class="align-items-center premio">
                        <div class="col right">
                            <h5>Premios</h5>
                            <span>{{$torneo->premio}} €</span>
                        </div>
                    </div>
                </article>
            </div>

            @if(Auth::check())


                @if(auth()->user()->rol == 'admin')

                    <div class="row">
                        <div class="col mt-3"  align="center" style="color: white">
                            <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarTorneo" style="display:inline">
                                <i class="fas fa-edit"></i>
                                Editar torneo
                            </a>
                        </div>
                        <div class="col mt-3"  align="center" style="color: white">
                            <a type="button" href="{{url('eliminar-torneo/'.$torneo->id)}}" class="boton-añadir" style="display:inline">
                                <i class="fas fa-trash-alt"></i>
                                Eliminar torneo
                            </a>
                        </div>
                    </div>


                @endif

            @endif
        </div>




        <div class="container articulo mt-5">
            <div class="header-seccion border-bottom">
                <div class="titulo-seccion">
                    <h2>Equipos participantes</h2>
                </div>
            </div>

            @if(Auth::check())

                @if(auth()->user()->rol == 'admin')

                    <div class="row">
                        <div class="col mt-3 mb-5"  align="center" style="color: white">
                            <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalAñadirEquipoAlTorneo" style="display:inline">
                                <i class="fas fa-edit"></i>
                                Añadir equipo participante
                            </a>
                        </div>
                    </div>


                @endif

            @endif
            <ul class="mt-5 lista-torneos active">
                @foreach($torneo->equipos as $equipo)


                    <div class="caja-equipo caja-torneos mb-5 mt-5">



                        @if(Auth::check())

                            @if(auth()->user()->rol == 'admin')


                                <div align="center" style="color: white; height: 50px; top: -45px; position:relative;">
                                    <a type="button" href="{{url('eliminar-equipoParticipante/'.$equipo->id, $torneo->id)}}" class="boton-añadir" style="display:inline">
                                        <i class="fas fa-trash-alt"></i>
                                        Quitar equipo del torneo
                                    </a>
                                </div>


                            @endif

                        @endif

                        <div class="body-equipo">
                            <h3><a href="#">{{$equipo->nombre}}</a></h3>
                            <span>
                                @foreach($equipo->torneos as $torneo)
                                    {{$torneo->juego->nombre}}
                                @endforeach
                            </span>
                            <ul class="miembros-equipo">
                                @foreach($equipo->jugadores as $jugador)
                                <li><a href="{{ url('/jugador/' . $jugador->id ) }}"><img class="imagen-jugador-equipo" src="{{ asset($jugador->foto) }}"></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="foot-equipo">
                            <div class="col">
                                <h5>País:</h5>
                                <p>{{$equipo->pais}}</p>
                            </div>
                            <div class="col aling-right pr-0 pl-0">
                                <a href="{{ url('/equipo/' . $equipo->id ) }}" class="botonTorneo">Más <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>


                @endforeach
            </ul>
        </div>


    </section>




    <form method="POST" action="{{route('editar-torneo')}}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal fade" id="modalEditarTorneo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Editar Torneo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="tituloEditarTorneo" name="tituloEditarTorneo" class="form-control validate" value="{{$torneo->titulo}}" required>
                            <label data-error="wrong" data-success="right" for="tituloEditarTorneo">Titulo</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <span class="pl-4 ml-3">Juego</span>

                            <select class="form-control validate" style="margin-left: 37px; margin-top: 10px; width: 90%" id="id_juegoEditar" name="id_juegoEditar">
                                @php($juegos = \App\Juego::all())
                                @foreach($juegos as $juego)
                                    @if($juego->id == $torneo->juego->id)
                                        <option value="{{$juego->id}}" selected>{{$juego->nombre}}</option>
                                        @else
                                        <option value="{{$juego->id}}">{{$juego->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fechaEditarTorneo" name="fechaEditarTorneo" class="form-control validate" value="{{$torneo->fecha}}" required>
                            <label data-error="wrong" data-success="right" for="fechaEditarTorneo">Fecha (Ej: 04/11/2020)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fotoEditarTorneo" name="fotoEditarTorneo" class="form-control validate" value="{{$torneo->foto}}" required>
                            <label data-error="wrong" data-success="right" for="fotoEditarTorneo">Foto (url de la foto)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="ubicacionEditarTorneo" name="ubicacionEditarTorneo" class="form-control validate" value="{{$torneo->ubicacion}}" required>
                            <label data-error="wrong" data-success="right" for="ubicacionEditarTorneo">Ubicación (Ej: Madrid, España)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="descripcionEditarTorneo" name="descripcionEditarTorneo" class="md-textarea form-control" rows="3" required>{{$torneo->descripcion}}</textarea>
                            <label data-error="wrong" data-success="right" for="descripcionEditarTorneo">Descripcion</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="number" id="premioEditarTorneo" name="premioEditarTorneo" class="form-control validate" value="{{$torneo->premio}}" required>
                            <label data-error="wrong" data-success="right" for="premioEditarTorneo">Premio (€)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="logoEditarTorneo" name="logoEditarTorneo" class="form-control validate" value="{{$torneo->logo}}" required>
                            <label data-error="wrong" data-success="right" for="logoEditarTorneo">Logo (url de la foto)</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="linkEditarTorneo" name="linkEditarTorneo" class="form-control validate" value="{{$torneo->link}}" required>
                            <label data-error="wrong" data-success="right" for="linkEditarTorneo">Link del torneo (url de la página)</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="reset" class="btn purple-gradient-rgba" value="Restablecer valores">
                        <button type="submit" class="btn purple-gradient">Editar Torneo <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                    <input type="hidden" name="id_torneo"  id="id_torneo" value="{{$torneo->id}}">
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="{{route('añadir-equipoAlTorneo')}}">

        {{csrf_field()}}

        <div class="modal fade" id="modalAñadirEquipoAlTorneo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Añadir equipo al torneo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <span class="pl-4 ml-3">Añadir equipo al torneo</span>

                            <select class="form-control validate" style="margin-left: 37px; margin-top: 10px; width: 90%" id="id_equipo" name="id_equipo">
                                <!-- Comprobar los equipos que ya participan en el torneo-->
                                @php($equipos=\App\Equipo::all())
                                @foreach($equipos as $equipo)
                                    @php($existe = false)

                                    @foreach($torneo->equipos as $equiposYaEnTorneo)
                                        @if($equipo->id == $equiposYaEnTorneo->id)
                                            @php($existe = true)
                                        @endif
                                    @endforeach

                                @if(!$existe)
                                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <input type="hidden" name="id_torneo" id="id_torneo" value="{{$torneo->id}}">
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn purple-gradient">Añadir equipo al torneo <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection



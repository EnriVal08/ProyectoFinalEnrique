@extends('layouts.master')
@section('content')

<section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
</section>

<section class="torneos">

    <div class="container articulo">

        <div class="caja-figura img-torneo" style="background-image: url('{{$jugador->fondo}}')">
            <div class="info-torneo">
                <figure>
                    <img src="{{asset($jugador->foto)}}" alt="Grandmasters Hearthstone">
                </figure>
                <div class="detalles-torneo">
                        <span>
                            {{$jugador->nombre}}
                        </span>
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{$jugador->pais}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="caja-torneoindividual">
            <article class="torneo-arriba">
                <div class="col mr-auto detalles-jugador">
                    <ul>
                        <li>
                            <span class="etiqueta">
                                Equipo
                            </span>
                            <span class="nombre">
                                @if($equipo != NULL)
                                {{$equipo->nombre}}
                                    @else
                                Actualmente no pertenece a ningún equipo
                                @endif
                            </span>
                        </li>
                        <li>
                            <span class="etiqueta">
                                Edad
                            </span>
                            <span class="nombre">
                                {{$jugador->edad}}
                            </span>
                        </li>
                    </ul>
                </div>
            </article>

            <article class="torneo-abajo">
                <div class="col left textarea">
                    <div class="textarea-head mb-20">
                        <h4>
                            Sobre {{$jugador->nombre}}
                        </h4>
                    </div>
                    <div>
                        <p>
                            {{$jugador->descripcion}}</p>
                    </div>
                </div>
                <div class="align-items-center premio">
                    <div class="col right">
                        <h5>Nombre Completo</h5>
                        <span>{{$jugador->nombre_completo}}</span>
                    </div>
                </div>
            </article>
        </div>
        @if(auth()->user()->rol == 'admin')

            <div class="row">
                <div class="col mt-3"  align="center" style="color: white">
                    <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarJugador" style="display:inline">
                        <i class="fas fa-edit"></i>
                        Editar Jugador
                    </a>
                </div>
                <div class="col mt-3"  align="center" style="color: white">
                    <a type="button" href="{{url('eliminar-jugador/'.$jugador->id)}}" class="boton-añadir" style="display:inline">
                        <i class="fas fa-trash-alt"></i>
                        Eliminar Jugador
                    </a>
                </div>
            </div>


        @endif
    </div>
</section>

<form method="POST" action="{{url('editar-jugador/'.$jugador->id)}}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    {{csrf_field()}}

    <div class="modal fade" id="modalEditarJugador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Editar Jugador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="nombreEditarJugador" name="nombreEditarJugador" class="form-control validate mt-3" value="{{$jugador->nombre}}" required>
                        <label data-error="wrong" data-success="right" for="nombreEditarJugador">Nick</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <span class="pl-4 ml-3">Equipo al que pertenece</span>

                        <select class="form-control validate" style="margin-left: 37px; margin-top: 10px; width: 90%" id="id_equipoJugador" name="id_equipoJugador">


                            @php($equipos = \App\Equipo::all())

                            @foreach($equipos as $equipo)

                                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="nombreCompletoEditarJugador" name="nombreCompletoEditarJugador" class="form-control validate mt-3" value="{{$jugador->nombre_completo}}" required>
                        <label data-error="wrong" data-success="right" for="nombreCompletoEditarJugador">Nombre completo</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="number" id="edadEditarJugador" name="edadEditarJugador" class="form-control validate mt-3" value="{{$jugador->edad}}" required>
                        <label data-error="wrong" data-success="right" for="edadEditarJugador">Edad</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="paisEditarJugador" name="paisEditarJugador" class="form-control validate mt-3" value="{{$jugador->pais}}" required>
                        <label data-error="wrong" data-success="right" for="paisEditarJugador">País</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-user prefix grey-text"></i>
                        <span class="pl-4 ml-3">Foto</span>
                        <br>
                        <input type="file" name="imagenEditarJugador" class="mb-5">
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="descripcionEditarJugador" name="descripcionEditarJugador" class="md-textarea form-control mt-3 mb-5" rows="3" required>{{$jugador->descripcion}}</textarea>
                        <label data-error="wrong" data-success="right" for="descripcionEditarJugador">Descripción</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fondoEditarJugador" name="fondoEditarJugador" class="form-control validate mt-3" value="{{$jugador->fondo}}" required>
                        <label data-error="wrong" data-success="right" for="fondoEditarJugador">Fondo (url de la foto)</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn purple-gradient">Editar Jugador <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

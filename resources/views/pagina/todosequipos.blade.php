@extends('layouts.master')
@section('content')

    <section class="torneos paddingtop" style="padding-top: 140px">
    <div class="container mt-5">

        <div class="header-seccion border-bottom">
            <div class="titulo-seccion">
                <h2>Equipos</h2>
            </div>
        </div>

        <ul class="lista-torneos active">
            @foreach($equipos as $equipo)
                <div class="caja-equipo caja-torneos mb-5">
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
                        <div class="col aling-right">
                            <a href="{{ url('/equipo/' . $equipo->id ) }}" class="botonTorneo">Más <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
    </section>


@endsection

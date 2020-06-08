@extends('layouts.master')
@section('content')

    <section class="torneos paddingtop" style="padding-top: 140px">
        <div class="container mt-5">

            <div class="header-seccion border-bottom">
                <div class="titulo-seccion">
                    <h2>Jugadores</h2>
                </div>
            </div>

                <ul class="card-list">
                    @foreach($jugadores as $jugador)

                        <li class="card">
                            <figure><img src="{{asset($jugador->foto)}}"></figure>
                            <div class="card-info">
                                <h4 class="title">{{$jugador->nombre}}</h4>
                                <span class="card-subtitle">{{$jugador->pais}}</span>
                                <a class="botonTorneo" href="{{ url('/jugador/' . $jugador->id ) }}">Perfil</a>
                            </div>
                        </li>
                    @endforeach

                </ul>
            {{ $jugadores->links('/vendor/pagination/bootstrap-4') }}
        </div>
    </section>


@endsection

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
                        <a class="botonTorneo" href="{{ url('/jugador/' . $jugador->id ) }}">Perfil</a>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>

</section>

@endsection

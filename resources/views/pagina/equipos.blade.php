@extends('layouts.master')
@section('content')

    <style>
        .equipo-fondo{
            height: 480px !important;
        }


        @media screen and (max-width: 992px){

            .equipos-logo li{
                margin: 0 !important;
                border-right: none;
                padding: 0!important;

            }

        }



        .card-list .card {
            margin: 20px 15px;
            display: -webkit-flex;
            display: flex;
            width: 350px;
            max-width: 100%;
            height: 230px;
            background-color: #202028;
            flex-direction: initial;
        }

        .card-list .card figure {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-shrink: 0;
            flex-shrink: 0;
            -webkit-align-items: flex-end;
            align-items: flex-end;
            width: 180px;
            margin-top: -30px;
        }

        .card-list .card figure img {
            max-width: 100%;
            max-height: 260px;
        }

        .card-list .card .card-info {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: flex-start;
            align-items: flex-start;
            color: #fff;
            width: 100%;
            font-weight: normal;
        }




        .card-list .card .card-info {
            margin: 24px 0 0px 24px;
        }

        .card-info .title{
            font-size: 1.125em;
            font-weight: 700;
            line-height: 22px;
        }

        @media screen and (max-width: 500px) {
            .card-list .card figure img {
                max-width: 100%;
            }

            .card-list .card figure{
                max-width: 80px;
                max-height: 180px;
            }

        }


        .card-list .card .card-info .botonTorneo {
            margin-top: auto;
            margin-left: auto;
            width: 100%;
            height: 56px;
            margin-bottom: 0 !important;
        }


        .card-list{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            justify-content: center;
        }
    </style>


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

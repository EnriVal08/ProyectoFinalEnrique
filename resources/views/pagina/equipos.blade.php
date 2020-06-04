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


</section>

@endsection

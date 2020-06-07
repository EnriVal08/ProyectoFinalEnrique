@extends('layouts.master')
@section('content')


    <style>

        .caja-equipo{
            margin: 0;
            width: 100%;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            color: #fff;
            background-color: #202028;
            max-width: 370px;
            max-height: 230px;
        }


        .body-equipo{
            margin-top: auto;
            text-align: center;
        }

        .body-equipo h3{
            font: 400 1.125em/1 "Montserrat",sans-serif;
        }

        .body-equipo span{
            font: 700 0.75em/1 "Montserrat",sans-serif;
            color: #59596d;
            text-transform: uppercase;
        }

        .body-equipo .miembros-equipo{
            margin-top: 20px;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
        }


        ul.miembros-equipo{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
        }


        .foot-equipo{
            margin-top: auto;
            display: -webkit-flex;
            display: flex;
            text-transform: uppercase;
        }

        .foot-equipo .col{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .foot-equipo h5{
            font: 700 0.75em/1 "Montserrat",sans-serif;
            color: #59596d;
            margin-bottom: 2px;
        }


        .foot-equipo p{
            font: 700 0.875em/1 "Montserrat",sans-serif;
            color: #fff;
        }

        .imagen-jugador-equipo{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
            height: 60px;
            max-width: 60px;
        }

        @media screen and (max-width: 460px){

            .imagen-jugador-equipo{
                height: 40px;
                max-width: 40px;
            }

        }

        .miembros-equipo li:hover{
            transform: translateY(-3px);
            -webkit-transition: all .25s ease-in-out;
            transition: all .25s ease-in-out;
        }

    </style>


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
                            <img class="logo-torneo" src="{{ asset($juego->logo) }}">
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

        </div>




        <div class="container articulo mt-5">
            <div class="header-seccion border-bottom">
                <div class="titulo-seccion">
                    <h2>Equipos participantes</h2>
                </div>
            </div>
            <ul class="lista-torneos active">
                @foreach($torneo->equipos as $equipo)
                    <div class="caja-equipo caja-torneos mb-5">
                        <div class="body-equipo">
                            <h3><a href="#">{{$equipo->nombre}}</a></h3>
                            <span>{{$juego->nombre}}</span>
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



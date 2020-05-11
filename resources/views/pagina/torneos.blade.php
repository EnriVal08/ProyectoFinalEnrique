@extends('layouts.master')
@section('content')

    <style>

        .celdas{
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .celdas img{
            max-width: 120px;
            background-color: rgba(0,0,0,0);
        }

        .inicio-noticias{
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .celdas li{
            height: 50px;
            width: fit-content;
            margin: 1px;
        }

        .celdas a{
            padding: 0 30px;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            text-align: center;
            height: 100%;
            color: white !important;
            text-decoration: none;
        }

        .celdas li a {
            background-color: rgba(105, 49, 249, 0.42);
        }

        .filtrar{
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            height: 345px;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .celdas .active{
            background-color: #6931f9;
        }

    </style>


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">

        <div class="filtrar">

            <ul class="nav mb-3 celdas" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <i class="fas fa-list"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <img src="https://i.pinimg.com/originals/4d/0d/e7/4d0de7d94f47f83c58dea2cdf1a93367.png" alt="Fortnite">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <img src="{{ asset('images/LogoHearthstone.png') }}" alt="Hearthstone">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <img src="{{ asset('images/LogoBS.png') }}" alt="Brawl Stars">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <img src="https://tic91011.files.wordpress.com/2017/10/cod_logo_eventpagev2_haazdrp.png?w=1000" alt="Brawl Stars">
                    </a>
                </li>
            </ul>



            <!--
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
-->

        </div>
    </section>

    <section class="torneos">
        <div class="container">
            <div class="header-seccion border-bottom">
                <div class="titulo-seccion">
                    <h2>Torneos</h2>
                </div>
            </div>
            <div class="content">
                <ul class="lista-torneos active">
                    @foreach($torneos as $torneo)
                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                            <div class="torneo-body">
                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                            </div>
                            <div class="torneo-footer">
                                <div class="col">
                                    <div>
                                        <h5>Premios</h5>
                                        <p>{{$torneo->premio}} €</p>
                                    </div>
                                </div>
                                <div class="col aling-right">
                                    <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>


@endsection

@extends('layouts.master')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach($juegos as $objeto)
                @if($objeto->id == $primerJuego->id)
                    <div class="carousel-item  active">
                @endif
                   @if($objeto->id != $primerJuego->id)
                    <div class="carousel-item">
                @endif
                        <div class="imagen" style="background-image: url('{{$objeto->foto}}')">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <span>{{$objeto->nombre}}</span>
                            <h1>{{$objeto->titulo}}</h1>
                            <a href="#" class="boton">Saber más <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
            @endforeach
                    </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <section class="noticias">
        <div class="container">
            <div class="header-seccion">
                <div class="titulo-seccion">
                    <h2>Nuevas Noticias</h2>
                </div>
            </div>
            <div>
                <div class="grid-noticias active">

                    @foreach($noticias as $noticia)
                        <article style="background-image: url('{{$noticia->foto}}')">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">{{$noticia->titulo}}</a></h3>
                                <div class="detalles">
                                <span>
                                    {{$noticia->fecha}}
                                </span>
                                </div>
                            </div>
                        </article>
                        @endforeach

                </div>
            </div>
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
                            <div class="col">
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

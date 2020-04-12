@extends('layouts.master')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @foreach($juegos as $juego)
                @if($juego == reset($juegos))
                    <div class="carousel-item  active">
                @endif
                   @if($juego != reset($juegos))
                    <div class="carousel-item">
                @endif
                        <div class="imagen" style="background-image: url('{{$juego->foto}}')">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <span>{{$juego->nombre}}</span>
                            <h1>{{$juego->titulo}}</h1>
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
                    <article style="background-image: url('https://1.bp.blogspot.com/-AbEpLyFeaWg/XTtj3s_gDaI/AAAAAAAAJdY/qxLuTDjEy9sfS9bFZyd92WJmisQ1uZRaQCLcBGAs/w0/teemo-lol-little-devil-splash-art-uhdpaper.com-4K-244-wp.thumbnail.jpg')">
                        <div class="overlay">
                            <a class="categoria">
                                Noticia
                            </a>
                            <h3><a href="#">Nuevo rework a Teemo</a></h3>
                            <div class="detalles">
                                <span>
                                    19 Febrero 2020
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('https://i.pinimg.com/originals/a5/18/5f/a5185f1c4a0e636e63c8b25c08213fd9.jpg')">
                        <div class="overlay">
                            <a class="categoria">
                                Torneo
                            </a>
                            <h3><a href="#">Hearthstone Bankyugi vs xBlizes</a></h3>
                            <div class="detalles">
                                <span>
                                    10 Julio 2020
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('https://pbs.twimg.com/media/ESNJvMVWkAAwE2s.jpg')">
                        <div class="overlay">
                            <a class="categoria">
                                Noticia
                            </a>
                            <h3><a href="#">Tft llega a dispositivos móviles</a></h3>
                            <div class="detalles">
                                <span>
                                    17 Marzo 2020
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('https://i.ytimg.com/vi/elnHfBCePyc/maxresdefault.jpg')">
                        <div class="overlay">
                            <a class="categoria">
                                Noticia
                            </a>
                            <h3><a href="#">El nuevo brawler se llama Sprout</a></h3>
                            <div class="detalles">
                                <span>
                                    11 Abril 2020
                                </span>
                            </div>
                        </div>
                    </article>
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
                    <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('https://wallpaperaccess.com/full/1371611.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-nombre">Torneo Fortnite Mobile</a>
                            <span class="fechaTorneo">29/05/2020 - 04:00 PM</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div>
                                    <h5>Premios</h5>
                                    <p>500.000 €</p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('https://lacongeladora.com/wp-content/uploads/2020/02/br.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-nombre">Brawl Stars Championship 3v3</a>
                            <span class="fechaTorneo">09/06/2020 - 11:00 AM</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div>
                                    <h5>Premios</h5>
                                    <p>25.000 €</p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('https://i11c.3djuegos.com/juegos/9766/hearthstone_heroes_of_warcraft/fotos/maestras/hearthstone_heroes_of_warcraft-3548890.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-nombre">Hearthstone Torneo Europa</a>
                            <span class="fechaTorneo">20/12/2020 - 08:00 AM</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div>
                                    <h5>Premios</h5>
                                    <p>100.000 €</p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('https://www.xtrafondos.com/wallpapers/call-of-duty-mobile-4007.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-nombre">Call of Duty Mobile Torneo Global 5v5</a>
                            <span class="fechaTorneo">01/11/2020 - 06:00 PM</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div>
                                    <h5>Premios</h5>
                                    <p>250.000 €</p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection

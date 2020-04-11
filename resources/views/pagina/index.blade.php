@extends('layouts.master')
@section('content')
    <style>


        .carousel-caption{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            height: 600px;
            max-width: 624px;
            text-align: left;
        }

        @media screen and (max-width: 992px){
            .carousel-caption{
                -webkit-align-items: center;
                max-width: initial;
                text-align: center;
                height: 400px;
            }
        }

        img{
            background-color: rgba(0,0,0,0.6);
        }



        .carousel-caption span{
            color: #6931f9;
            font-family: "Montserrat", sans serif;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 4px;
            display: block;
            margin-bottom: 14px;
            font-weight: bold;
            position: relative;

        }

        .carousel-caption h1{
            display: block;
            font-size: 34px;
            font-weight: bold;
            position: relative;

        }

        .carousel-caption a{
            text-transform: uppercase;
            padding-top: 16px;
            display: inline-block;
            color: #fff;
            margin-top: 15px;
            font-family: "Montserrat", sans serif;
            font-weight: bold;

        }

        .boton{
            background-color: #6931f9;
            width: 200px;
            border: 2px solid #6931f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            text-align: center;
            border-radius: 30px;
        }

        .boton:hover{
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border-color: white;
        }

        .imagen{
            height: 988px;
            padding-top: 152px;
            background-position: center;
            background-size: cover;
            display: flex;
            display: -webkit-flex;
        }

        .imagen:before {
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.6);
        }


        .noticias{
            padding-top: 70px;
            padding-bottom: 50px;
        }

        .header-seccion{
            margin-bottom: 40px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(10,12,17,0.14);
            display: flex;
        }

        h2{
            font-family: "Montserrat", sans serif;
            margin-bottom: 0px;
            font-weight: bold;
        }



        .noticias .grid-noticias{
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
            display: -webkit-flex;
            -webkit-flex-wrap: wrap;
        }


        @media screen and (max-width: 1270px){
            .noticias .grid-noticias{
                justify-content: space-evenly;
            }
        }

        .noticias .grid-noticias article{
            width: 260px;
            height: 350px;
            background-size: cover;
            background-position: center;
            cursor: pointer;
            margin: 10px;
            display: flex;
            transition: 1s all;
        }

        .noticias .grid-noticias article .overlay{
            padding: 26px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
        }

        .categoria{
            background-color: #6931f9;
            font-family: "Montserrat", sans serif;
            width: fit-content;
            padding: 6px 8px;
        }

        h3{
            margin: 10px 0;
            font-family: "Montserrat", sans serif;
        }

        .detalles{
            display: flex;
            font-family: "Montserrat", sans serif;
            color: #b9b9b9;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .noticias .grid-noticias article .overlay .detalles span{
            font-size: 12px;
        }

        .noticias .grid-noticias article .overlay a{
            color: white;
        }


        .noticias .grid-noticias article:hover{
            filter: opacity(75%);
        }

        .torneos{
            background: #1a191e;
            padding: 68px;
        }

        .caja-torneos{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            max-width: 555px;
            width: 100%;
            height: 310px;
            background-size: cover;
            background-position: center;
        }


        @media screen and (max-width: 1270px){
            .caja-torneos{
                justify-content: space-evenly;
            }

            .footer-menu{
                justify-content: space-evenly;
            }
        }

        .torneo-body{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            padding: 28px;
        }


        .lista-torneos .caja-torneos .torneo-body .torneo-nombre{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 25px;
        }



        a{
            color: white;
        }

        .torneos .header-seccion h2{
            margin-bottom: 0;
            color: white;
            font-family: "Montserrat", sans serif;
        }

        .fechaTorneo{
            color: white;
            text-transform: uppercase;
            margin-bottom: 18px;
            font-family: "Montserrat", sans serif;
            font-weight: bold;
        }

        .torneo-footer{
            display: -webkit-flex;
            display: flex;
            align-items: flex-end;
            margin-top: auto;
        }

        .col{
            margin-left: 28px;
            text-transform: uppercase;
        }

        h5{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 15px;
        }

        p{
            font-family: "Montserrat", sans serif;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .botonTorneo{
            background: #6931f9;
            height: 52px;
            font-family: "Montserrat", sans serif;
            text-transform: uppercase;
            width: 200px;
            align-items: center;
            display: flex;
            display: -webkit-flex;
            -webkit-justify-content: center;
            justify-content: center;
            font-size: 15px;
        }

        .botonTorneo:hover{
            transition: 0.8s;
            color: white;
            box-shadow: -20px 0 rgba(105,49,249,0.7);
        }

        .lista-torneos .caja-torneos .botonTorneo i{
            margin-left: 15px;
        }



        .lista-torneos{
            display: flex;
            flex-wrap: wrap;
            display: -webkit-flex;
            -webkit-flex-wrap: wrap;
        }


        ul{
            padding: 0;
            list-style-type: none;
        }

        .torneos .lista-torneos li{
            margin: 0;
        }



        footer{
            background-color: black;
            overflow: hidden;
        }

        footer .footer-contenido{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: 60px;
            margin-bottom: 60px;
        }

        footer .footer-contenido .footer-apartado-logo{
            margin-right: 80px;
        }

        footer .footer-contenido .footer-apartado{
            margin-right: auto;
        }

        footer .footer-contenido .footer-apartado.contacto{
            width: 230px;
            font-weight: bold;
        }

        footer .footer-contenido .footer-apartado.footer-noticias{
            width: 230px;
        }

        footer .logo img{
            width: 200px;
            height: 200px;
        }

        .cajaLogo ul{
            margin-top: 23px;
            display: -webkit-flex;
            display: flex;
        }

        .cajaLogo ul li a{
            color: #636f7d;
            font-size: 19px;
            -webkit-transition: color .6s;
            transition: color .6s;
        }

        .cajaLogo ul li a:hover{
            color: #6931f9;
        }

        footer .footer-contenido .footer-apartado ul li{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
        }

        footer .footer-contenido .footer-apartado .tituloFooter{
            font-family: "Montserrat", sans serif;
            font-size: 28px;
            color: white;
        }

        footer .footer-contenido .footer-apartado ul li i{
            color: #586370;
            margin-right: 14px;
        }

        footer .footer-contenido .footer-apartado ul li .detalles{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
        }

        footer .footer-contenido .footer-apartado ul li .detalles span{
            font-size: 16px;
            color: white;
        }

        footer .footer-contenido .footer-apartado ul li .detalles a{
            font-size: 13px;
            color: #636f7d;
            text-transform: none;
            font-weight: bold;
            letter-spacing: normal;
        }

        footer .footer-contenido .footer-apartado.footer-noticias .footer-noticia{
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #12171c;
        }

        footer .footer-contenido .footer-apartado.footer-noticias a{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 15px;
            transition: color 0.8s;
            -webkit-transition: color 0.8s;
        }

        footer .footer-contenido .footer-apartado.footer-noticias a:hover{
            color: white;
        }

        footer .footer-contenido .footer-apartado.footer-noticias .todas-noticias a{
            color: white;
            font-size: 17px;
            font-weight: bold;
        }

        footer .footer-contenido .footer-apartado.footer-noticias .todas-noticias a i{
            color: white;
            margin-left: 6px;
        }

        footer .footer-contenido .footer-apartado.footer-menu ul li:not(:first-of-type){
            margin-bottom: 15px;
        }

        footer .footer-contenido .footer-apartado.footer-menu ul li a{
            font-family: "Montserrat", sans serif;
            font-size: 14px;
            text-transform: uppercase;
            color: #636f7d;
            -webkit-transition: color .8s;
            transition: color .8s;
            font-weight: bold;
        }

        footer .footer-contenido .footer-apartado.footer-menu ul li a:hover{
            color: white;
        }


        footer .ubicacion{
            display: -webkit-flex;
            display: flex;
            justify-content: center;
            -webkit-justify-content: center;
            padding: 40px;
            border-top: 1px solid #141a21;
        }

        footer .ubicacion .info{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            height: 70px;
        }

        footer .ubicacion .info .ciudad{
            color: white;
            font-family: "Montserrat", sans serif;
            font-size: 22px;
        }

        footer .ubicacion .info .ciudad i{
            color: #6931f9;
        }

        footer .ubicacion .info .domicilio{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 15px;
            margin-left: 30px;
            font-weight: bold;
        }

        footer .barra-footer{
            background-color: #6931f9;
            display: -webkit-flex;
            display: flex;
            height: 140px;
        }

        footer .barra-footer .container{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
        }


        footer .volver-arriba{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            right: 0;
            top: -60px;
            background-color: white;
            color: #6931f9;
            font-size: 26px;
            width: 40px;
            height: 40px;
            cursor: pointer;
            position: relative;
        }

    </style>

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



    <footer>
        <div class="container">
            <div class="footer-contenido">
                <div class="footer-apartado-logo">
                    <div class="cajaLogo">
                        <a href="#" class="logo" rel="home">
                            <img src="{{ asset('images/BrawlStars.png') }}" alt="Logo Gamid">
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-apartado contacto">
                    <ul>
                        <li class="tituloFooter">
                            Contacto
                        </li>
                        <li>
                            <i class="fas fa-bell"></i>
                            <div class="detalles">
                                <span>Media</span>
                                <a>enriquevalverde45@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footer-apartado footer-noticias">
                    <ul>
                        <li class="tituloFooter">
                            Ultimas noticias
                        </li>
                        <li class="footer-noticia">
                            <a href="#">Titulo noticia 1 asdf asd asdf asdfsadf asdf</a>
                        </li>
                        <li class="footer-noticia">
                            <a href="#">Titulo noticia 1 asdf asdfasdf asdfasd fasd ff</a>
                        </li>
                        <li class="todas-noticias">
                            <a href="#">Ver todas las noticias <i class="fas fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-apartado footer-menu">
                    <ul>
                        <li class="tituloFooter">
                            Menu 1
                        </li>
                        <li>
                            <a href="#">
                                <span>Torneos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Equipos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Jugadores</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Noticias</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-apartado footer-menu">
                    <ul>
                        <li class="tituloFooter">
                            Menu 2
                        </li>
                        <li>
                            <a href="#">
                                <span>Noticias</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Tienda</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Sobre nosotros</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ubicacion">
                <div class="info">
                    <span class="ciudad">
                        <i class="fas fa-map-marker-alt"></i>
                        Lucena, Córdoba
                    </span>
                    <span class="domicilio">
                        C/Tras la Parra nº8
                    </span>
                </div>
            </div>
        </div>
        <div class="barra-footer">
            <div class="container">
                <div class="volver-arriba">
                    <i class="fas fa-angle-up"></i>
                </div>
                <div class="copyright">
                    <p>
                        GAMID es una página web creada por Enrique Valverde
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endsection

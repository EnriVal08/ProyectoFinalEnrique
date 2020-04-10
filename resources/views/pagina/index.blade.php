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
            font-size: 2em;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
            position: relative;
            font-family: merienda;

        }

        .carousel-caption a{
            text-transform: uppercase;
            padding-top: 16px;
            display: inline-block;
            color: #fff;
            margin-top: 15px;
            text-decoration: none;
            font-family: "Montserrat", sans serif;
            font-weight: bold;
            position: relative;

        }

        .boton{
            background-color: #6931f9;
            width: 200px;
            border: 2px solid #6931f9;
            word-break: break-word;
            flex-shrink: 0;
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
            flex-shrink: 0;
            padding-top: 70px;
            padding-bottom: 50px;
        }

        .section-header{
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



        .noticias .news-grid{
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
            display: -webkit-flex;
            -webkit-flex-wrap: wrap;
        }


        @media screen and (max-width: 1270px){
            .noticias .news-grid{
                justify-content: space-evenly;
            }
        }

        .noticias .news-grid article{
            position: relative;
            background-color: black;
            width: 260px;
            height: 350px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
            margin: 8px;
            display: flex;
            transition: 1s all;
        }

        .noticias .news-grid article .overlay{
            position: relative;
            z-index: 1;
            padding: 26px;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
        }

        .category{
            background-color: #6931f9;
            font-family: "Montserrat", sans serif;
            display: block;
            width: fit-content;
            line-height: 1;
            margin: 0px;
            padding: 6px 8px;
        }

        h3{
            display: block;
            margin: 10px 0;
            font-family: "Montserrat", sans serif;
            color: white;
            max-width: 220px;
        }

        .details{
            display: flex;
            line-height: 1;
            font-family: "Montserrat", sans serif;
            color: #b9b9b9;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .noticias .news-grid article .overlay .details span{
            font-size: 12px;
            font-family: 'Nunito', sans-serif;
        }

        .noticias .news-grid article .overlay a{
            color: white;
            text-decoration: none;
        }


        .noticias .news-grid article:hover{
            filter: opacity(75%);
        }

        .torneos{
            background: #1a191e;
            padding: 68px 0;
        }

        .torneo-box{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-transition: all .4s;
            transition: all .4s;
            background: #000;
            background-position: center top;
            background-blend-mode: luminosity;
            background-size: cover;
            flex-shrink: 0;
            max-width: 555px;
            width: 100%;
            min-height: 310px;
            color: #fff;
        }

        @media screen and (max-width: 1270px){
            .torneo-box{
                justify-content: space-evenly;
            }
        }

        .torneo-body{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            padding: 28px;
            z-index: 2;
        }


        .torneos-list .torneo-box .torneo-body .torneo-name{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            margin-bottom: 6px;
            font-size: 25px;
        }



        a{
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .torneos .section-header h2{
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
            -webkit-align-items: flex-end;
            align-items: flex-end;
            margin-top: auto;
            z-index: 2;
        }

        .col{
            margin-left: 28px;
            display: flex;
            display: -webkit-flex;
            text-transform: uppercase;
        }

        h5{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            margin-bottom: 4px;
            font-size: 15px;
        }

        p{
            font-family: "Montserrat", sans serif;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .align-right{
            margin-left: auto;
        }

        .botonTorneo{
            background: #6931f9;
            min-width: 165px;
            height: 52px;
            border-color: #6931f9;
            margin-left: 24px;
            border-radius: 0;
            transition: all .4s;
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
            box-shadow: -20px 0px rgba(105,49,249,0.7);
        }

        .torneos-list .torneo-box .botonTorneo i{
            margin-left: 15px;
        }

        .container{
            width: 1200px;
        }

        .torneos-list{
            display: flex;
            flex-wrap: wrap;
            display: -webkit-flex;
            -webkit-flex-wrap: wrap;
        }


        ul{
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .torneos .torneos-list li{
            margin: 0;
        }



        footer{
            background-color: black;
            overflow: hidden;
            display: block;
        }

        footer .footer-content{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 60px 0;
        }

        footer .footer-content .footer-widget-logo{
            margin-right: 80px;
        }

        footer .footer-content .footer-widget{
            margin-right: auto;
        }

        footer .footer-content .footer-widget.contacto{
            margin-left: 0;
            max-width: 230px;
            font-weight: bold;
        }

        footer .footer-content .footer-widget.footer-noticias{
            max-width: 230px;
        }

        footer .custom-logo-link img{
            max-width: 240px;
            max-height: 60px;
            height: auto;
        }

        .cajaLogo ul{
            margin-top: 23px;
            display: -webkit-flex;
            display: flex;
        }

        .cajaLogo ul li{
            margin-right: 25px;
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

        footer .footer-content .footer-widget ul li{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            margin-bottom: 30px;
            margin-top: 0;
        }

        footer .footer-content .footer-widget .tituloFooter{
            font-family: "Montserrat", sans serif;
            font-size: 28px;
            margin-bottom: 44px;
            color: white;
        }

        footer .footer-content .footer-widget ul li i{
            color: #586370;
            margin-right: 14px;
        }

        footer .footer-content .footer-widget ul li .details{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-justify-content: center;
            justify-content: center;
        }

        footer .footer-content .footer-widget ul li .details span{
            font-family: "Montserrat", sans serif;
            font-size: 16px;
            margin-bottom: 9px;
            color: white;
        }

        footer .footer-content .footer-widget ul li .details a{
            font-size: 13px;
            color: #636f7d;
            text-transform: none;
            font-family: "Montserrat", sans serif;
            font-weight: bold;
            letter-spacing: normal;
        }

        footer .footer-content .footer-widget.footer-noticias .footer-noticia{
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #12171c;
        }

        footer .footer-content .footer-widget.footer-noticias a{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 15px;
            transition: color 0.8s;
            -webkit-transition: color 0.8s;
        }

        footer .footer-content .footer-widget.footer-noticias a:hover{
            color: white;
        }

        footer .footer-content .footer-widget.footer-noticias .todas-noticias a{
            color: white;
            font-size: 17px;
            font-weight: bold;
        }

        footer .footer-content .footer-widget.footer-noticias .todas-noticias a i{
            color: white;
            font-size: 17px;
            font-weight: bold;
            margin-left: 6px;
            margin-bottom: 0;
        }

        footer .footer-content .footer-widget.footer-menu ul li:not(:first-of-type){
            margin-bottom: 15px;
        }

        footer .footer-content .footer-widget.footer-menu ul li a{
            font-family: "Montserrat", sans serif;
            font-size: 14px;
            text-transform: uppercase;
            color: #636f7d;
            -webkit-transition: color .8s;
            transition: color .8s;
            font-weight: bold;
        }

        footer .footer-content .footer-widget.footer-menu ul li a:hover{
            color: white;
        }


        footer .ubicacion{
            display: -webkit-flex;
            display: flex;
            justify-content: center;
            -webkit-justify-content: center;
            padding: 44px 0;
            border-top: 1px solid #141a21;
        }

        footer .ubicacion .info{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-flex-shrink: 0;
            flex-shrink: 0;
            height: 72px;
        }

        footer .ubicacion .info .ciudad{
            color: white;
            font-family: "Montserrat", sans serif;
            font-size: 22px;
            margin-bottom: 14px;
        }

        footer .ubicacion .info .ciudad i{
            color: #6931f9;
        }

        footer .ubicacion .info .domicilio{
            color: #636f7d;
            font-family: "Montserrat", sans serif;
            font-size: 15px;
            margin-left: 28px;
            font-weight: bold;
        }

        footer .barra-footer{
            background-color: #6931f9;
            display: -webkit-flex;
            display: flex;
            color: white;
            height: 134px;
        }

        footer .barra-footer .container{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        footer .barra-footer p{
            font-family: "Montserrat", sans serif;
            font-size: 15px;
            color: white;
        }

        footer .volver-arriba{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            z-index: 2;
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
            <div class="section-header">
                <div class="section-title normal">
                    <h2>Nuevas Noticias</h2>
                </div>
            </div>
            <div class="tab-content content">
                <div class="news-grid active">
                    <article style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/news_thumb_14.jpg')">
                        <div class="overlay">
                            <a class="category">
                                Noticia
                            </a>
                            <h3><a href="#">Teemo iaasd as dfaosidfas dasdf </a></h3>
                            <div class="details">
                                <span class="date">
                                    Mayo 01, 2020
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/news_thumb_09.jpg')">
                        <div class="overlay">
                            <a class="category">
                                Gaming
                            </a>
                            <h3><a href="#">Play5 añlsdnflñ asndfasd a asd fasdf ñl</a></h3>
                            <div class="details">
                                <span class="date">
                                    Enero 10, 2019
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/news_thumb_10.jpg')">
                        <div class="overlay">
                            <a class="category">
                                Noticia
                            </a>
                            <h3><a href="#">kraken alñsndf aospdfh  asdf a dsfa sdfasd f </a></h3>
                            <div class="details">
                                <span class="date">
                                    Septiembre 10, 2020
                                </span>
                            </div>
                        </div>
                    </article>
                    <article style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/news_thumb_14.jpg')">
                        <div class="overlay">
                            <a class="category">
                                Esports
                            </a>
                            <h3><a href="#">Teemo iaaasd asdf a sdfasd fas d dsfsdf f </a></h3>
                            <div class="details">
                                <span class="date">
                                    Octubre 23, 2018
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
            <div class="section-header border-bottom">
                <div class="section-title">
                    <h2>Torneos</h2>
                </div>
            </div>
            <div class="content">
                <ul class="torneos-list active">
                    <li class="torneo-box" style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/thumbnail_tournament.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-name">Torneo Fortnite Mobile</a>
                            <span class="fechaTorneo">Oct.09.2019 - 02:35pm</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div class="col-item">
                                    <h5>Premios</h5>
                                    <p>2.500.000 €</p>
                                </div>
                            </div>
                            <div class="col align-right">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="torneo-box" style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/base-copy-2.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-name">Brawl Stars Championship 3v3</a>
                            <span class="fechaTorneo">Jan.09.2020 - 00:00am</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div class="col-item">
                                    <h5>Premios</h5>
                                    <p>1.400 €</p>
                                </div>
                            </div>
                            <div class="col align-right">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="torneo-box" style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/base-copy-2.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-name">Hearthstone Torneo Europa</a>
                            <span class="fechaTorneo">Dec.20.2020 - 01:10pm</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div class="col-item">
                                    <h5>Premios</h5>
                                    <p>1.000.000 €</p>
                                </div>
                            </div>
                            <div class="col align-right">
                                <a href="#" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="torneo-box" style="background-image: url('http://themes.pixiesquad.com/pixiefreak/twisting-nether/wp-content/uploads/2018/10/thumbnail_tournament.jpg')">
                        <div class="torneo-body">
                            <a class="torneo-name">Call of Duty Mobile Torneo Global 5v5</a>
                            <span class="fechaTorneo">Nov.1.2020 - 14:00am</span>
                        </div>
                        <div class="torneo-footer">
                            <div class="col">
                                <div class="col-item">
                                    <h5>Premios</h5>
                                    <p>3.500 €</p>
                                </div>
                            </div>
                            <div class="col align-right">
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
            <div class="footer-content">
                <div class="footer-widget-logo">
                    <div class="cajaLogo">
                        <a href="#" class="custom-logo-link" rel="home">
                            <span>
                                Logo
                            </span>
                            <img width="462" height="84" src="" class="custom-logo">
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
                <div class="footer-widget contacto">
                    <ul>
                        <li class="tituloFooter">
                            Contacto
                        </li>
                        <li>
                            <i class="fas fa-bell"></i>
                            <div class="details">
                                <span>Media</span>
                                <a>enriquevalverde45@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footer-widget footer-noticias">
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
                <div class="footer-widget footer-menu">
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
                <div class="footer-widget footer-menu">
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

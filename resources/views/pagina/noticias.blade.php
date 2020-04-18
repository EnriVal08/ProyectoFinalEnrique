@extends('layouts.master')
@section('content')
    <style>

        .inicio-noticias{
            display: -webkit-flex;
            display: flex;
            height: 550px;
            margin-bottom: 10px;
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .inicio-noticias:before {
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.6);
        }

        .inicio-noticias h2{
            font-size: 2.25em;
            color: white;
            line-height: 1;
            margin-bottom: 15px;
        }

        .inicio-noticias h4{
            font-size: .875em;
            color: #6931f9;
            line-height: 1;
        }



        .pagina-noticias-container{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            justify-content: center;
        }


        .caja-noticias{
            max-width: 1200px;
            width: 100%;
            -webkit-flex-shrink: 0;
            flex-shrink: 0;
            padding: 70px 25px 50px;
        }


        aside{
            margin-top: 90px;
            width: 280px;
            margin-left: 30px;
            margin-bottom: 60px;
            display: block;
        }

        aside .barra-ultimas-noticias:not(:last-child){
            margin-bottom: 36px;
        }

        aside form{
            border: 1px solid #6931f9;
            display: -webkit-flex;
            display: flex;
            padding: 6px;
        }

        aside form button{
            border-left: 1px solid #bababa;
            color: black;
            width: 50px;
            order: 2;
        }

        button{
            border: none;
            background: transparent;
        }

        aside form input{
            padding: 0 5px;
            order: 1;
            border: 0;
            outline: none;
        }

        aside .barra-ultimas-noticias h3{
            font: 500 1.625em/1.1 "Montserrat",sans-serif;
            color: black;
            margin-bottom: 20px;
        }

        ul{
            padding: 0;
            margin: 0;
            list-style-type: none;
        }


        .barra-ultimas-noticias ul li:not(:last-child){
            padding-bottom: 5px;
        }

        .barra-ultimas-noticias .post-list li{
            padding: 20px 0;
            border-top: 1px solid rgba(159,159,159,0.25);
        }

        .barra-ultimas-noticias ul li .categories{
            margin-bottom: 6px;
            line-height: 1;
        }

        .barra-ultimas-noticias ul li .categories a{
            font: 700 0.75em/1 "Montserrat",sans-serif;
            color: #6931f9;
            display: inline-block;
        }

        .barra-ultimas-noticias ul li a.title {
            font: 600 1.125em/22px "Montserrat",sans-serif;
            color: #000;
            margin-bottom: 6px;
            display: block;
        }

        .barra-ultimas-noticias ul li .date {
            font: 700 0.75em/1 "Montserrat",sans-serif;
            color: #6d6d6d;
        }

        .barra-ultimas-noticias .post-list li span {
            display: block;
            line-height: 1;
        }


    </style>

    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <div class="news-page">
        <section class="pagina-noticias-container">

            <div class="caja-noticias">
                <div class="header-seccion">
                    <div class="titulo-seccion">
                        <h2>Noticias</h2>
                    </div>
                </div>
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
                        <article style="background-image: url('https://media.pocketgamer.com/artwork/na-31154-1582760697/knighthood-ios-artwork-key-art.jpg');">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">Hola que pasa chavah</a></h3>
                                <div class="detalles">
                                <span>
                                    22-05-2021
                                </span>
                                </div>
                            </div>
                        </article>
                        <article style="background-image: url('https://i.redd.it/tbzj79c3jn011.png');">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">Hola que pasa chavah</a></h3>
                                <div class="detalles">
                                <span>
                                    07-11-2020
                                </span>
                                </div>
                            </div>
                        </article>
                        <article style="background-image: url('https://i.pinimg.com/originals/2e/58/c2/2e58c264c8635cb0ca913b7873f56a39.png');">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">Hola que pasa chavah</a></h3>
                                <div class="detalles">
                                <span>
                                    01-12-2020
                                </span>
                                </div>
                            </div>
                        </article>
                        <article style="background-image: url('https://images2.alphacoders.com/888/888713.png');">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">Hola que pasa chavah</a></h3>
                                <div class="detalles">
                                <span>
                                    18-02-2020
                                </span>
                                </div>
                            </div>
                        </article>
                        <article style="background-image: url('https://lh3.googleusercontent.com/YqOzIcgsCvG9OAKsQCZq0ziiZDne_4qMB191krrxkkcZ87h6pgHs68e0tjp9Vm0UCiZp');">
                            <div class="overlay">
                                <a class="categoria">
                                    Noticia
                                </a>
                                <h3><a href="#">Hola que pasa chavah</a></h3>
                                <div class="detalles">
                                <span>
                                    20-08-2020
                                </span>
                                </div>
                            </div>
                        </article>
                    </div>
            </div>


            <aside>
                <article class="barra-ultimas-noticias">
                    <form method="get" action="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <input type="text" class="search_field" placeholder="Search">
                    </form>
                </article>
                <article class="barra-ultimas-noticias">
                    <h3>Ultimas noticas</h3>
                    <ul class="post-list">
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Gaming
                                </a>
                            </div>
                            <a class="title">Titulo de la primera noticia</a>
                            <span class="date">
                                Hoy mismo tmb
                            </span>
                        </li>
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Gaming
                                </a>
                            </div>
                            <a class="title">Titulo de la segunda noticia asdf asd asdf asd</a>
                            <span class="date">
                                Hoy mismo tmb
                            </span>
                        </li>
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Noticia
                                </a>
                            </div>
                            <a class="title">Titulo de la tercera noticia asdfasdf asdfasd fasdfasd f</a>
                            <span class="date">
                                Hoy mismo tmb
                            </span>
                        </li>
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Torneo
                                </a>
                            </div>
                            <a class="title">Titulo de la cuarta noticia asdf a sdfa sdfa sdfasdfasdfasdf</a>
                            <span class="date">
                                Mañana
                            </span>
                        </li>
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Torneo
                                </a>
                            </div>
                            <a class="title">Titulo de la quinta noticia asdf a sdfa sdfa sdfasdfasdfasdf</a>
                            <span class="date">
                                Ayer
                            </span>
                        </li>
                    </ul>
                </article>
            </aside>
        </section>
    </div>
@endsection

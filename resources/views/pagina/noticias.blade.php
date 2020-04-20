@extends('layouts.master')
@section('content')
    <style>

    </style>

    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

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
                        @foreach($ultimas_noticias as $ultima_noticia)
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Gaming
                                </a>
                            </div>
                            <a class="title">{{$ultima_noticia->titulo}}</a>
                            <span class="date">
                                {{$ultima_noticia->fecha}}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </article>
            </aside>
        </section>
@endsection

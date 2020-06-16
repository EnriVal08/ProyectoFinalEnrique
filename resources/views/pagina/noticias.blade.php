@extends('layouts.master')
@section('content')

        <section class="pagina-noticias-container">

            <div class="caja-noticias">
                <div class="header-seccion">
                    <div class="titulo-seccion">
                        <h2>Noticias</h2>
                    </div>
                </div>
                    <div class="grid-noticias active">
                        @foreach($noticias as $noticia)
                            <article style="background-image: url('{{$noticia->foto}}')" onclick="window.location.href = '{{ url('/noticia/' . $noticia->id ) }}';">
                                <div class="overlay">
                                    <a class="categoria">
                                        Noticia
                                    </a>
                                    <h3>{{$noticia->titulo}}</h3>
                                    <div class="detalles">
                                <span>
                                    {{$noticia->fecha}}
                                </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                    </div>

                {{ $noticias->links('/vendor/pagination/bootstrap-4') }}
            </div>


            <aside>
                <article class="barra-ultimas-noticias">
                    <!--<form method="get" action="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <input type="text" class="search_field" placeholder="Search">
                    </form>-->
                </article>
                <article class="barra-ultimas-noticias">
                    <h3>Últimas noticias</h3>
                    <ul class="post-list">
                        @foreach($ultimas_noticias as $ultima_noticia)
                        <li>
                            <div class="categories">
                                <a href="#">
                                    Gaming
                                </a>
                            </div>
                            <a class="title" href="{{ url('/noticia/' . $ultima_noticia->id ) }}">{{$ultima_noticia->titulo}}</a>
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

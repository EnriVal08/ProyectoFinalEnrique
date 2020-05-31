@extends('layouts.master')
@section('content')

    @php
        use App\Noticia;$ultimas_noticias=Noticia::take(8)->orderby('id', 'DESC')->get();
    @endphp







    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h3>Oops! Página no encontrada</h3>
                <h1><span>4</span><span>0</span><span>4</span></h1>
            </div>
            <h2>Lo siento, la página solicitada no existe</h2>
        </div>
    </div>


    <section class="pagina-noticias-container">

        <div class="caja-noticias">
            <div class="header-seccion">
                <div class="titulo-seccion">
                    <h2>Quizás le pueda interesar...</h2>
                </div>
            </div>
            <div class="grid-noticias active">
                @foreach($ultimas_noticias as $noticia)
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

        </div>

    </section>

@endsection

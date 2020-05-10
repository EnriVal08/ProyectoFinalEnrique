@extends('layouts.master')
@section('content')


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="noticia-individual">
        <div class="container articulo">
            <figure class="caja-figura">
                <img class="img-fluid" src="{{$juego->foto}}">
            </figure>
            <div class="wrapper">
                <div class="redes-sociales">
                    <ul class="lista-redes">
                        <li class="social">
                            <a href="#" class="fab fa-twitter"></a>
                        </li>
                        <li class="social">
                            <a href="#" class="fab fa-facebook-f"></a>
                        </li>
                        <li class="social">
                            <a href="#" class="fab fa-instagram"></a>
                        </li>
                    </ul>
                </div>

                <div class="contenido-noticia">
                    <h1 class="titulo-post">{{$juego->titulo}}</h1>

                    <p class="text-justify">
                        {!! nl2br(e($juego->descripcion), false) !!}
                    </p>
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="{{$juego->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>



        </div>
    </section>


@endsection

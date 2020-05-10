@extends('layouts.master')
@section('content')

    <style>
        .noticia-individual{
            background-color: white;
            padding-bottom: 50px;
        }

        .articulo{
            position: relative;
            top: -400px;
        }

        .noticia-individual .caja-figura{
            height: 600px;
        }

        @media screen and (max-width: 992px){

            .noticia-individual .caja-figura{
                height: 400px;
            }

        }

        .caja-figura{
            top: 0px;
            min-height: 330px;
            z-index: 1;
            text-align: center;
            position: relative;
        }

        .caja-figura img{
            max-height: 100%;
        }


        figure{
            display: block;
            margin: 0;
        }

        .noticia-individual .container .wrapper{
            margin-top: 0px;
        }

        .noticia-individual .wrapper{
            display: flex;
            display: -webkit-flex;
            margin-bottom: -400px;
        }

        .noticia-individual .redes-sociales{
            margin: 0 44px;
            width: 90px;
        }

        .noticia-individual .contenido-noticia{
            width: 1020px;
            padding-top: 20px;
            padding-bottom: 20px;
            margin-bottom: 20px;

        }

        .noticia-individual .redes-sociales .lista-redes{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: flex-end;
            align-items: flex-end;
            margin-top: 24px;
        }

        .lista-redes li{
            margin-bottom: 6px;
        }

        .wrapper .redes-sociales .fab {
            font-size: 20px;
            width: 36px;
            height: 36px;
            text-align: center;
            text-decoration: none;
            border-radius: 18px;
            line-height: 36px;
        }

        .wrapper .redes-sociales .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .wrapper .redes-sociales .fa-facebook-f {
            background: #3B5998;
            color: white;
        }

        .wrapper .redes-sociales .fa-instagram {
            background: #125688;
            color: white;
        }

        .noticia-individual .contenido-noticia .titulo-post{
            margin: 0 0 15px;
        }

        .noticia-individual .contenido-noticia h1{
            color: black;
            margin: 24px 0;
            font-weight: 500;
            font-family: "Montserrat", sans serif;
            line-height: 1;
            font-size: 2.5em;
        }

        .noticia-individual .contenido-noticia .detalles-post{
            font: 400 0.875em "Montserrat", sans serif;
            text-transform: uppercase;
            color: #999;
            letter-spacing: 3.5px;
            display: block;
            margin-bottom: 30px;
        }

        .autor{
            color: #6931f9;
        }

        .noticia-individual .contenido-noticia p{
            font-size: 18px;
            font-family: "Montserrat", sans serif;
            color: #696969;
            font-weight: normal;
        }

    </style>

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

                    <iframe width="560" height="315" src="{{$juego->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            </div>



        </div>
    </section>


@endsection

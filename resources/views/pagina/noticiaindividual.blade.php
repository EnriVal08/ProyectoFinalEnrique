@extends('layouts.master')
@section('content')

    <style>
        .noticia-individual{
            background-color: white;
            padding-bottom: 130px;
        }

        .noticia-individual .caja-figura{
            height: 600px;
        }

        .caja-figura{
            top: -420px;
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


        .inicio-noticias:before {
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.9);
        }


        .noticia-individual .container .wrapper{
            margin-top: -380px;
        }

        .noticia-individual .wrapper{
            display: flex;
            display: -webkit-flex;

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
            margin-bottom: 54px;
            display: block;
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


        .comentarios{
            border-top: 1px solid #6931f9;
        }
    </style>

    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="noticia-individual">
        <div class="container">
            <figure class="caja-figura">
                <img class="img-fluid" src="{{$noticia->foto}}">
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
                    <h1 class="titulo-post">{{$noticia->titulo}}</h1>
                    <span class="detalles-post">Publicado por <span class="autor">{{$autor->nombre}}</span> el {{$noticia->fecha}}</span>

                    <p class="text-justify">
                        {!! nl2br(e($noticia->descripcion), false) !!}
</p>

                @foreach($noticia->fotos as $foto)
                            <img class="img-fluid z-depth-4" width="800px" src="{{$foto->foto}}" alt="Generic placeholder image">
                    @endforeach
                </div>
            </div>



            <section class="comentarios">

                <div class="m-3">
                    <h4>{{($noticia->comentarios)->count()}} comentarios <a class="btn purple-gradient" data-toggle="modal" data-target="#modalContactForm">Añade el tuyo</a>
                    </h4>
                </div>

                <ul class="list-unstyled">
                    @foreach($noticia->comentarios as $comentario)
                    <li class="media m-3 mb-5">
                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 font-weight-bold">{{$comentario->nombre_usuario}}</h5>
                            {{$comentario->descripcion}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </section>

            <form method="POST" action="">

                {{csrf_field()}}

            <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Comentario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="nombre" name="nombre" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="nombre">Nombre</label>
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="email" name="email" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="email">Email</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-pencil prefix grey-text"></i>
                                <textarea type="text" id="texto" name="texto" class="md-textarea form-control" rows="4"></textarea>
                                <label data-error="wrong" data-success="right" for="texto">Comentario</label>
                            </div>

                            <input type="hidden" name="idNoticia" value="{{$noticia->id}}">

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn purple-gradient">Publicar <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>

@endsection

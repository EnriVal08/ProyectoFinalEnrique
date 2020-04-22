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
            width: 100%;
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
            border-bottom: 1px solid #777;

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

        .comentario{
            margin-left: 178px;
        }
    </style>

    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="noticia-individual">
        <div class="container">
            <figure class="caja-figura">
                <img src="https://1.bp.blogspot.com/-AbEpLyFeaWg/XTtj3s_gDaI/AAAAAAAAJdY/qxLuTDjEy9sfS9bFZyd92WJmisQ1uZRaQCLcBGAs/w0/teemo-lol-little-devil-splash-art-uhdpaper.com-4K-244-wp.thumbnail.jpg">
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
                    <h1 class="titulo-post">Teemo tendrá un rework en la próxima actualización de Summoners Rift</h1>
                    <span class="detalles-post">Publicado por <span class="autor">Enrique</span> el 22 de Abril de 2020</span>
                    <p>asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif asdfo aopsdhfop hasdofhoahsdfpo hoapisd hfpoah sdfpoh aiusdhbfiad sif</p>
                </div>
            </div>

            <section class="comentario">
            <div class="mb-4">

                <h2 class="h1-responsive font-weight-bold my-4">Comentarios</h2>

                <div class="row">

                    <div class="col-md-9 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Nombre*</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">Email*</label>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        <label for="message">Comentario</label>
                                    </div>

                                </div>
                            </div>

                        </form>

                        <div class="text-center text-md-left">
                            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                        <div class="status"></div>
                    </div>

                </div>

            </div>
            </section>
        </div>
    </section>
@endsection

@extends('layouts.master')
@section('content')

    <style>

        .col{
            margin: 0;
        }

        .img-torneo{
            background-position: center;
            background-size: cover;
            display: flex;
            display: -webkit-flex;
        }

        .img-torneo:before {
            content:'';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.8);
        }


        .info-torneo{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            z-index: 9;
        }

        .info-torneo figure{
            max-width: 250px;
            margin: 0 42px 0 54px;
        }

        img{
            width: 100%;
        }

        .detalles-torneo{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            justify-content: center;
            -webkit-justify-content: center;
            color: white;
        }

        .detalles-torneo ul{
            margin-top: 23px;
            display: -webkit-flex;
            display: flex;
        }

        .detalles-torneo li{
            margin-right: 14px;
            color: #6931f9;
        }

        .detalles-torneo i{
            color: white;
        }

        .detalles-torneo span{
            font: 500 1.125em/1 "Montserrat",sans-serif;
            margin-bottom: 2px;
        }

        .caja-torneoindividual{
            background-color: #202028;
            padding: 34px 30px;
            margin-bottom: 50px;
        }

        .torneo-arriba{
            padding-bottom: 28px;
            margin-bottom: 32px;
            border-bottom: 1px solid #333;
        }

        .torneo-arriba figure{
            max-width: 200px;
        }

        .logo-torneo{
            max-width: 100%;
        }

        .caja-torneoindividual article{
            display: flex;
            display: -webkit-flex;
            -webkit-flex-direction: row;
            flex-direction: row;
        }



        .torneo-abajo .textarea{
            max-width: 550px;
        }


        .torneo-abajo h4{
            color: #fff;
            text-transform: uppercase;
            font-size: 19px;
            font-weight: bold;
        }

        .torneo-abajo p{
            font-size: 13px;
            color: #dadae0;
            font-weight: normal;
            font-family: 'Nunito', sans-serif;
        }

        .torneo-abajo h5{
            font-weight: 700;
            font-size: 20px;
            color: #dadae0;
        }

        .torneo-abajo span{
            font-size: 19px;
            color: #6931f9;
            font-weight: 500;
            display: block;
        }

        .premio{
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: flex-end;
            align-items: flex-end;
            margin-left: auto;
        }



        @media screen and (max-width: 768px){
            article.torneo-arriba{
                -webkit-flex-direction: column;
                flex-direction: column;
                -webkit-align-items: center;
                align-items: center;
                padding-bottom: 20px;
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width: 992px){
            article.torneo-abajo{
                -webkit-flex-direction: column;
                flex-direction: column;
                -webkit-align-items: center;
                align-items: center;
            }

            article.torneo-arriba{
                -webkit-flex-direction: column;
                flex-direction: column;
                -webkit-align-items: center;
                align-items: center;
                padding-bottom: 20px;
                margin-bottom: 20px;
            }

            .torneo-arriba figure{
                margin: auto;
            }

            article.torneo-abajo .col.right{
                width: 100%;
                -webkit-justify-content: center;
                justify-content: center;
            }

            .premio{
                margin-left: 0;
            }

            .col{
                text-align: center;
            }
        }




    </style>


    <section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
    </section>

    <section class="torneos">

        <div class="container articulo">

            <div class="caja-figura img-torneo" style="background-image: url('{{$torneo->foto}}')">
                <div class="info-torneo">
                    <figure>
                        <img src="{{$torneo->logo}}" alt="Grandmasters Hearthstone">
                    </figure>
                    <div class="detalles-torneo">
                        <span>
                            {{$torneo->titulo}}
                        </span>
                        <ul>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                {{$torneo->ubicacion}}
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                {{$torneo->fecha}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="caja-torneoindividual">
                <article class="torneo-arriba">
                    <div class="col mr-auto">
                        <figure>
                            <img class="logo-torneo" src="{{ asset($juego->logo) }}">
                        </figure>
                    </div>
                    <div class="premio">
                        <div class="col right">
                            <a href="#" class="btn btn-black">Más información</a>

                        </div>
                    </div>
                </article>

                <article class="torneo-abajo">
                    <div class="col left textarea">
                        <div class="textarea-head mb-20">
                            <h4>
                                Sobre el torneo
                            </h4>
                        </div>
                        <div>
                            <p>
                                {{$torneo->descripcion}}</p>
                        </div>
                    </div>
                    <div class="align-items-center premio">
                        <div class="col right">
                            <h5>Premios</h5>
                            <span>{{$torneo->premio}} €</span>
                        </div>
                    </div>
                </article>
            </div>




        </div>
    </section>

@endsection



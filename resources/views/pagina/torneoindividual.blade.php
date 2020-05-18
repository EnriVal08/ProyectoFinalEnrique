@extends('layouts.master')
@section('content')

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
                            <a href="{{$torneo->link}}" target="_blank" class="btn btn-black">Más información</a>

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



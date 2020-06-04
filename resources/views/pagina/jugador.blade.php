@extends('layouts.master')
@section('content')

<section class="inicio-noticias" style="background-image: url('https://www.solofondos.com/wp-content/uploads/2015/12/eb030ae837c1c43420b377e290cd4937.jpg');">
</section>

<section class="torneos">

    <div class="container articulo">

        <div class="caja-figura img-torneo" style="background-image: url('{{$jugador->fondo}}')">
            <div class="info-torneo">
                <figure>
                    <img src="{{asset($jugador->foto)}}" alt="Grandmasters Hearthstone">
                </figure>
                <div class="detalles-torneo">
                        <span>
                            {{$jugador->nombre}}
                        </span>
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{$jugador->pais}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="caja-torneoindividual">
            <article class="torneo-arriba">
                <div class="col mr-auto detalles-jugador">
                    <ul>
                        <li>
                            <span class="etiqueta">
                                Equipo
                            </span>
                            <span class="nombre">
                                {{$equipo->nombre}}
                            </span>
                        </li>
                        <li>
                            <span class="etiqueta">
                                Edad
                            </span>
                            <span class="nombre">
                                {{$jugador->edad}}
                            </span>
                        </li>
                    </ul>
                </div>
            </article>

            <article class="torneo-abajo">
                <div class="col left textarea">
                    <div class="textarea-head mb-20">
                        <h4>
                            Sobre {{$jugador->nombre}}
                        </h4>
                    </div>
                    <div>
                        <p>
                            {{$jugador->descripcion}}</p>
                    </div>
                </div>
                <div class="align-items-center premio">
                    <div class="col right">
                        <h5>Nombre Completo</h5>
                        <span>{{$jugador->nombre_completo}}</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

@endsection

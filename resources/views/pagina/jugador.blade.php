@extends('layouts.master')
@section('content')

<style>



    .torneo-arriba span{
        display: block;
        font-weight: 600;
        text-transform: uppercase;
        color: #60626D;
    }


    .nombre{
        color: white !important;
    }

    .torneo-arriba li{
        padding: 16px 40px 16px 0;
        margin: 0 40px 0 0;
        border-right: 1px solid #333;
    }


    .detalles-jugador{
        -webkit-flex-direction: column;
        flex-direction: column;
        margin-right: auto;
    }

    .detalles-jugador ul{
        display: flex;
        display: -webkit-flex;
    }

    @media screen and (max-width: 992px){

.detalles-jugador ul{
    justify-content: center;
    margin-left: 20px;

}
        .torneo-arriba li{
      padding-left: 10px;
      margin: 0;
      border-right: none;
  }

    }

</style>



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
                        <span>{{$jugador->nombre_completo}}
</span>
                    </div>
                </div>
            </article>
        </div>

    </div>

</section>


@endsection

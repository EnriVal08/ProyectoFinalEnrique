@extends('layouts.master')
@section('content')
    <section class="torneos" style="padding-top: 140px">
        <div class="container">
            <div class="header-seccion border-bottom">
                <div class="titulo-seccion">
                    <h2>Torneos</h2>
                </div>
            </div>


            <div class="filtrar mb-3">

                <ul class="nav mb-3 celdas" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fas fa-list"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-fortnite" role="tab" aria-controls="pills-home" aria-selected="true">
                            <img src="{{ asset('images/logoFortnite.png') }}" alt="Fortnite">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-hearthstone" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <img src="{{ asset('images/game-logo-overwatch.png') }}" alt="Overwatch">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-brawl" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <img src="{{ asset('images/LogoBS.png') }}" alt="Brawl Stars">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-callofduty" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <img src="{{ asset('images/logoCallofduty.png') }}" alt="Call of Duty">
                        </a>
                    </li>
                </ul>

            </div>

            <div class="content">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><ul class="lista-torneos active">
                                @foreach($torneos as $torneo)
                                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                                            <div class="torneo-body">
                                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                                            </div>
                                            <div class="torneo-footer">
                                                <div class="col">
                                                    <div>
                                                        <h5>Premios</h5>
                                                        <p>{{$torneo->premio}} €</p>
                                                    </div>
                                                </div>
                                                <div class="col aling-right">
                                                    <a href="{{url('/torneo/'.$torneo->id)}}" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="pills-fortnite" role="tabpanel" aria-labelledby="pills-profile-tab">@php $id = 4;@endphp  <ul class="lista-torneos active">
                                @foreach($torneos as $torneo)
                                    @if($torneo->id_juego == $id)
                                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                                            <div class="torneo-body">
                                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                                            </div>
                                            <div class="torneo-footer">
                                                <div class="col">
                                                    <div>
                                                        <h5>Premios</h5>
                                                        <p>{{$torneo->premio}} €</p>
                                                    </div>
                                                </div>
                                                <div class="col aling-right">
                                                    <a href="{{url('/torneo/'.$torneo->id)}}" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-hearthstone" role="tabpanel" aria-labelledby="pills-contact-tab">@php $id = 5;@endphp  <ul class="lista-torneos active">
                                @foreach($torneos as $torneo)
                                    @if($torneo->id_juego == $id)
                                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                                            <div class="torneo-body">
                                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                                            </div>
                                            <div class="torneo-footer">
                                                <div class="col">
                                                    <div>
                                                        <h5>Premios</h5>
                                                        <p>{{$torneo->premio}} €</p>
                                                    </div>
                                                </div>
                                                <div class="col aling-right">
                                                    <a href="{{url('/torneo/'.$torneo->id)}}" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-brawl" role="tabpanel" aria-labelledby="pills-contact-tab">@php $id = 3;@endphp  <ul class="lista-torneos active">
                                @foreach($torneos as $torneo)
                                    @if($torneo->id_juego == $id)
                                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                                            <div class="torneo-body">
                                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                                            </div>
                                            <div class="torneo-footer">
                                                <div class="col">
                                                    <div>
                                                        <h5>Premios</h5>
                                                        <p>{{$torneo->premio}} €</p>
                                                    </div>
                                                </div>
                                                <div class="col aling-right">
                                                    <a href="{{url('/torneo/'.$torneo->id)}}" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-callofduty" role="tabpanel" aria-labelledby="pills-contact-tab">@php $id = 2;@endphp  <ul class="lista-torneos active">
                                @foreach($torneos as $torneo)
                                    @if($torneo->id_juego == $id)
                                        <li class="caja-torneos" style="background-image: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{$torneo->foto}}')">
                                            <div class="torneo-body">
                                                <a class="torneo-nombre">{{$torneo->titulo}}</a>
                                                <span class="fechaTorneo">{{$torneo->fecha}}</span>
                                            </div>
                                            <div class="torneo-footer">
                                                <div class="col">
                                                    <div>
                                                        <h5>Premios</h5>
                                                        <p>{{$torneo->premio}} €</p>
                                                    </div>
                                                </div>
                                                <div class="col aling-right">
                                                    <a href="{{url('/torneo/'.$torneo->id)}}" class="botonTorneo">Mas detalles <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>


                    </div>


            </div>
        </div>
    </section>


@endsection

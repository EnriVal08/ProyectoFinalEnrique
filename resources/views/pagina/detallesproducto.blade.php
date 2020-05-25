@extends('layouts.master')
@section('content')


    <section class="pagina-producto">
        <div class="container">

            <div class="seccion-producto row mb-5">

                <div class="producto col-sm-6">

                    <figure>
                        <img  class="imagen_producto" src="{{$producto->foto}}">
                    </figure>

                </div>

                <div class="detalles_producto col-sm-6 mb-5">
                    <h1 class="titulo-producot">{{$producto->nombre}}</h1>
                    <p class="precio_producto">{{$producto->precio}} €</p>
                    <form method="POST" action="" class="mb-5 row">
                        <div class="col-sm-3">
                            <input type="number" class="cantidad" min="1" size="4" value="1">
                        </div>
                        <div class="col-sm-9">
                            <button class="boton-añadir" type="submit" name="añadir" value="añadir">Añadir al carrito</button>
                        </div>
                    </form>
                    <span>Categoría: <a href="#" class="categoria-producto">{{$producto->categoria}}</a></span>
                </div>

            </div>


                <div class="container mb-5">
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                               aria-selected="true">Descripción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                               aria-selected="false">Opiniones</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h2>Descripción</h2>
                            <p>{{$producto->descripcion}}</p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h2>Opiniones</h2>
                        </div>
                    </div>
                </div>

            </div>

    </section>


@endsection

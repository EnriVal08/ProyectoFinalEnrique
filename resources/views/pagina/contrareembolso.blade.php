@extends('layouts.master')
@section('content')


    <section class="tienda cesta">

        <div class="container">

            <div class="row">


                <div class="col-lg-12">


                    <div class="card mb-3">

                        <div class="card-body">
                        Compra realizada correctamente.

                        <h5 class="mb-4">Productos Comprados</h5>

                        @foreach($cesta as $productosUsuario)

                        @foreach($productosUsuario->productos as $producto)

                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                             src="{{$producto->foto}}" alt="Sample">
                                        <a href="#!">
                                            <div class="mask waves-effect waves-light">
                                                <img class="img-fluid w-100"
                                                     src="">
                                                <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="text-center">
                                            <div class="mt-4">
                                                <p class="mb-3 text-muted small">{{$producto->nombre}}</p>
                                                <p class="mb-2 text-muted  small">Unidades: {{$productosUsuario->cantidad}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                        @endforeach
                        @endforeach
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">Llegada prevista a {{$direccion[0]->direccion }}</h5>

                            <p class="mb-0">{{ $envio }}</p>
                        </div>
                    </div>

                </div>




            </div>


        </div>

    </section>




@endsection



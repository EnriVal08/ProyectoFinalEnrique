@extends('layouts.master')
@section('content')

    <section class="tienda cesta">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                @if(sizeof($pedidos)<1)
                        <div class="card wish-list mb-3">
                            <div class="card-body">


                                <p class="mb-4">No ha realizado ningún pedido</p>

                                <a type="button" href="{{url('/tienda')}}" class="btn boton-añadir" style="display:inline; color: white">
                                    <i class="fas fa-shopping-cart"></i>
                                    Ir a tienda
                                </a>

                            </div>
                        </div>
                        @endif

                    @foreach($pedidos as $pedido)

                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">Fecha de envío</h5>

                            <p class="mb-0">{{$pedido->fecha}}</p>

                        </div>
                    </div>

                    <div class="card wish-list mb-3">
                        <div class="card-body">


                            @php($total = 0)
                                @foreach($pedido->productosPedido as $producto)


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
                                                        <p class="mb-2 text-muted  small">Unidades: {{$producto->pivot->cantidad}}</p>
                                                        <p class="mb-3 text-muted small">Precio individual: {{$producto->precio}} €</p>
                                                        <!-- Input type hidden para realizar la operación del total del pedido, pero que no se muestre en pantalla hasta hacer todos los cálculos-->
                                                        <input type="hidden" value="{{$total += ($producto->precio * $producto->pivot->cantidad)}}">
                                                        <p class="mb-3 mt-5 text-muted small">Precio Total: <b> {{number_format($producto->precio * $producto->pivot->cantidad, 2)}} €</b></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                @endforeach
                            <p class="mb-0">Precio Final del pedido: {{$total}} €</p>

                            @endforeach
                            {{$pedidos->links('/vendor/pagination/bootstrap-4') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @endsection

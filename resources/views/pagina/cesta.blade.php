@extends('layouts.master')
@section('content')
<style>
    .qt, .qt-plus, .qt-minus {
        display: block;
        float: left;
    }

    .qt {
        font-size: 19px;
        line-height: 50px;
        width: 70px;
        text-align: center;
    }

    .qt-plus, .qt-minus {
        background: #fcfcfc;
        border: none;
        font-size: 30px;
        font-weight: 300;
        height: 100%;
        padding: 0 20px;
        -webkit-transition: background .2s linear;
        -moz-transition: background .2s linear;
        -ms-transition: background .2s linear;
        -o-transition: background .2s linear;
        transition: background .2s linear;
    }

    .qt-plus:hover, .qt-minus:hover {
        background: #6931f9;
        color: #fff;
        cursor: pointer;
    }

    .qt-plus {
        line-height: 50px;
    }

    .qt-minus {
        line-height: 47px;
    }
</style>




<body>



    <section class="tienda cesta">

        <div class="container">

        <div class="row">


            <div class="col-lg-8">


                <div class="card wish-list mb-3">
                    <div class="card-body">


                        <h5 class="mb-4">Cesta</h5>



                        @foreach($cesta as $producto)

                            @foreach($producto->productos as $prueba)

                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100"
                                         src="{{$prueba->foto}}" alt="Sample">
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
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-3 text-muted text-uppercase small">{{$prueba->nombre}}</p>
                                            <p class="mb-2 text-muted text-uppercase small">{{$prueba->categoria}}</p>
                                            <p class="mb-3 text-muted text-uppercase small">{{$prueba->precio}} €</p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">

                                                <input class="quantity" min="1" max="100" name="quantity" id="product_{{$producto->id}}" type="number" value="{{$producto->cantidad}}">

                                                <a class="btn btn-update-item boton-añadir" href="#" data-href="{{ route('cart-update', $producto->id ) }}" data-id="{{$producto->id}}"><i style="color: white" class="fas fa-sync"></i></a>

                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                Pulsa el botón al hacer cambios en la cantidad
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                    class="fas fa-trash-alt mr-1"></i> Quitar producto</a>
                                        </div>

                                        <p class="mb-0 full-price" ><span><strong>{{number_format($prueba->precio * $producto->cantidad,2)}}€</strong></span></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">

@endforeach
                        @endforeach


                        <p class="text-primary mb-0"><i style="color: #6931f9" class="fas fa-info-circle mr-1"></i> </p>

                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-4">Tiempo de envío estimado</h5>

                        <p class="mb-0"> Miércoles 3 junio - Viernes 5 junio  </p>
                    </div>
                </div>



                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-4">Aceptamos</h5>

                        <img class="mr-2" width="45px"
                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                             alt="Visa">
                        <img class="mr-2" width="45px"
                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                             alt="American Express">
                        <img class="mr-2" width="45px"
                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                             alt="Mastercard">
                        <img class="mr-2" width="45px"
                             src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                             alt="PayPal acceptance mark">
                    </div>
                </div>


            </div>



            <div class="col-lg-4">


                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Cantidad total</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Gastos de envío
                                <span>Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Cantidad total</strong>
                                    <strong>
                                        <p class="mb-0">(incluido IVA)</p>
                                    </strong>
                                </div>
                                <span><strong>{{number_format($total,2)}} €</strong></span>
                            </li>
                        </ul>

                        <button type="button" class="btn boton-añadir btn-block waves-effect waves-light">Comprar</button>

                    </div>
                </div>



                <div class="card mb-3">
                    <div class="card-body">

                        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"
                           aria-expanded="false" aria-controls="collapseExample1">
                            Añadir código de descuento (opcional)
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>

                        <div class="collapse" id="collapseExample1">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code1" class="form-control font-weight-light"
                                           placeholder="Introducir código de descuento">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        </div>
    </section>


@endsection

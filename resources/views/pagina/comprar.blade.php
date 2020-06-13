@extends('layouts.master')
@section('content')

    <style>


        .paypal-logo {
            font-family: Verdana, Tahoma;
            font-weight: bold;
            font-size: 18px;
        }

        .paypal-logo .pay {
            color: #253b80;
        }

        .paypal-logo .pal {
            color: #179bd7;
        }


        .paypal-button {
            padding: 15px 30px;
            border: 1px solid #FF9933;
            border-radius: 5px;
            background-image: linear-gradient(#FFF0A8, #F9B421);
            margin: 0 auto;
            display: block;
            min-width: 138px;
            position: relative;
        }

        .contrareembolso-button {
            padding: 15px 30px;
            border: 1px solid;
            border-radius: 5px;
            background-color: #2C2E2F;
            margin: 0 auto;
            display: block;
            min-width: 138px;
            position: relative;
            color: white;
        }


        .paypal-button-title {
             font-size: 14px;
             color: #505050;
             vertical-align: baseline;
             text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);
         }

        .paypal-logo {
            display: inline-block;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);
            font-size: 20px;
        }



    </style>

   <section class="tienda cesta">

       <div class="container">

           <div class="row">


               <div class="col-lg-12">


                   <div class="card mb-3">
                       <div class="card-body">

                           @if($errors->any())

                               <div class="alert alert-danger alert-dismissable mx-auto" style="max-width: 500px;">
                                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   <strong>Error en el Registro:</strong>
                                   <hr>
                                   @foreach($errors->all() as $error)
                                       <li>{{$error}}</li>
                                       <hr>
                                   @endforeach
                               </div>
                           @endif

                           <h5 class="mb-4">Dirección de envío</h5>


                           <div class="mx-auto" style="max-width: 500px; text-align: center">
                               @include('flash::message')

                           </div>
                           @if($direccion != null)

                           <p class="mb-3">{{$direccion->alias}}</p>

                           <p class="mb-2 text-muted small">{{$direccion->nombre}} {{$direccion->apellidos}}</p>


                           <p class="mb-2 text-muted small">{{$direccion->direccion}}</p>


                           <p class="mb-2 text-muted small">{{$direccion->codigo_postal}} {{$direccion->poblacion}}, {{$direccion->provincia}}, {{$direccion->pais}}</p>


                           <p class="mb-3 text-muted small">Tel {{$direccion->telefono}}</p>




                           <a class="btn purple-gradient" data-toggle="modal" data-target="#modalContactFormEditar">Editar dirección</a>

                       </div>
                               <form id="editar" method="POST" action="">
                                   {{method_field('PUT')}}
                                   {{csrf_field()}}

                                   <div class="modal fade" id="modalContactFormEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header text-center">
                                                   <h4 class="modal-title w-100 font-weight-bold">Editar Direccion</h4>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body mx-3">


                                                   <div class="row">

                                                       <div class="col-xs-12">
                                                           <div class="row">
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-flag prefix grey-text"></i>
                                                                       <input type="text" id="pais" name="pais" class="form-control validate" value="{{$direccion->pais}}">
                                                                       <label data-error="wrong" data-success="right" for="pais">País</label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-city prefix grey-text"></i>
                                                                       <input type="text" id="provincia" name="provincia" class="form-control validate" value="{{$direccion->provincia}}">
                                                                       <label data-error="wrong" data-success="right" for="provincia">Elige provincia</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="col-xs-12">
                                                           <div class="row">
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-user-circle prefix grey-text"></i>
                                                                       <input type="text" id="alias" name="alias" class="form-control validate" value="{{$direccion->alias}}">
                                                                       <label data-error="wrong" data-success="right" for="alias">Alias (casa, trabajo...)</label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-address-card prefix grey-text"></i>
                                                                       <input type="text" id="nif" name="nif" class="form-control validate" value="{{$direccion->nif}}">
                                                                       <label data-error="wrong" data-success="right" for="nif">CIF/NIF/NIE</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>


                                                       <div class="col-xs-12">
                                                           <div class="row">
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-user prefix grey-text"></i>
                                                                       <input type="text" id="nombreD" name="nombreD" class="form-control validate" value="{{$direccion->nombre}}">
                                                                       <label data-error="wrong" data-success="right" for="nombreD">Nombre</label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-user prefix grey-text"></i>
                                                                       <input type="text" id="apellidos" name="apellidos" class="form-control validate" value="{{$direccion->apellidos}}">
                                                                       <label data-error="wrong" data-success="right" for="apellidos">Apellidos</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>


                                                       <div class="col-xs-12">
                                                           <div class="row">
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-map-marker-alt prefix grey-text"></i>
                                                                       <input type="text" id="direccion" name="direccion" class="form-control validate" value="{{$direccion->direccion}}">
                                                                       <label data-error="wrong" data-success="right" for="direccion">Direccion</label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-thumbtack prefix grey-text"></i>
                                                                       <input type="text" id="codigo_postal" name="codigo_postal" class="form-control validate" value="{{$direccion->codigo_postal}}">
                                                                       <label data-error="wrong" data-success="right" for="codigo_postal">Código Postal</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="col-xs-12">
                                                           <div class="row">
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-home prefix grey-text"></i>
                                                                       <input type="text" id="poblacion" name="poblacion" class="form-control validate" value="{{$direccion->poblacion}}">
                                                                       <label data-error="wrong" data-success="right" for="poblacion">Población</label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xs-12 col-lg-6">
                                                                   <div class="md-form p-0">
                                                                       <i class="fas fa-phone prefix grey-text"></i>
                                                                       <input type="text" id="telefono" name="telefono" class="form-control validate" value="{{$direccion->telefono}}">
                                                                       <label data-error="wrong" data-success="right" for="telefono">Teléfono</label>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                   </div>

                                                    <input type="hidden" value="{{$direccion->id}}" name="id" id="id">
                                               </div>
                                               <div class="modal-footer d-flex justify-content-center">
                                                   <button type="submit" class="btn purple-gradient">Guardar Dirección <i class="fas fa-paper-plane-o ml-1"></i></button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               </form>

                           @else

                               <a class="btn purple-gradient" data-toggle="modal" data-target="#modalContactForm">Añadir dirección</a>

                           @endif

                   </div>

                   <div class="card wish-list mb-3">
                       <div class="card-body">


                           <h5 class="mb-4">Confirmar entrega</h5>

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
                           <h5 class="mb-4">Pago</h5>


                           @if($direccion == null)

                               <p class="mb-4">Debes de añadir una dirección de envío antes de proceder con el pago</p>

                           @endif

                                        <button onclick="window.location='{{ route('paypal') }}'" class="paypal-button mb-5" @if($direccion == null) disabled @endif>

                                            <span class="paypal-button-title">
                                              Pagar ahora con
                                            </span>

                                            <span class="paypal-logo">
                                            <i class="pay">Pay</i><i class="pal">Pal</i>
                                            </span>

                                        </button>



                                        <span class="paypal-logo">
                                            o
                                        </span>


                                       <button onclick="window.location='{{ route('eliminar-cesta') }}'" class="contrareembolso-button mt-5" @if($direccion == null) disabled @endif>

                                           Pago contrareembolso

                                       </button>


                       </div>

                   </div>

               </div>




           </div>



           <form id="añadir" method="POST" action="{{ route('añadirDireccion') }}">

               {{csrf_field()}}

               <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header text-center">
                               <h4 class="modal-title w-100 font-weight-bold">Añadir Direccion</h4>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body mx-3">


                               <div class="row">

                                   <div class="col-xs-12">
                                       <div class="row">
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-flag prefix grey-text"></i>
                                                   <input type="text" id="pais" name="pais" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="pais">País</label>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-city prefix grey-text"></i>
                                                   <input type="text" id="provincia" name="provincia" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="provincia">Elige provincia</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-xs-12">
                                       <div class="row">
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-user-circle prefix grey-text"></i>
                                                   <input type="text" id="alias" name="alias" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="alias">Alias (casa, trabajo...)</label>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-address-card prefix grey-text"></i>
                                                   <input type="text" id="nif" name="nif" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="nif">CIF/NIF/NIE</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>


                                   <div class="col-xs-12">
                                       <div class="row">
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-user prefix grey-text"></i>
                                                   <input type="text" id="nombreD" name="nombreD" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="nombreD">Nombre</label>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-user prefix grey-text"></i>
                                                   <input type="text" id="apellidos" name="apellidos" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="apellidos">Apellidos</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>


                                   <div class="col-xs-12">
                                       <div class="row">
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-map-marker-alt prefix grey-text"></i>
                                                   <input type="text" id="direccion" name="direccion" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="direccion">Direccion</label>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-thumbtack prefix grey-text"></i>
                                                   <input type="text" id="codigo_postal" name="codigo_postal" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="codigo_postal">Código Postal</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-xs-12">
                                       <div class="row">
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-home prefix grey-text"></i>
                                                   <input type="text" id="poblacion" name="poblacion" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="poblacion">Población</label>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-lg-6">
                                               <div class="md-form p-0">
                                                   <i class="fas fa-phone prefix grey-text"></i>
                                                   <input type="text" id="telefono" name="telefono" class="form-control validate">
                                                   <label data-error="wrong" data-success="right" for="telefono">Teléfono</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               </div>


                           </div>
                           <div class="modal-footer d-flex justify-content-center">
                               <button type="submit" class="btn purple-gradient">Guardar Dirección <i class="fas fa-paper-plane-o ml-1"></i></button>
                           </div>
                       </div>
                   </div>
               </div>

           </form>
       </div>

   </section>




@endsection



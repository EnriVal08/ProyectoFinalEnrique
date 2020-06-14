@extends('layouts.master')
@section('content')


    <section class="pagina-producto">
        <div class="container">
<div style="margin-top: 120px">
    @include('flash::message')

</div>
            <div class="seccion-producto row mb-5">

                <div class="producto col-sm-6">

                    <figure>
                        <img  class="imagen_producto" src="{{$producto->foto}}">
                    </figure>

                </div>

                <div class="detalles_producto col-sm-6 mb-5">

                    <h1 class="titulo-producot">{{$producto->nombre}}</h1>
                    <p class="precio_producto">{{$producto->precio}} €</p>
                    <form method="POST" action="{{ route('añadir') }}" class="mb-5 row">
                        @csrf
                        <div class="col-sm-3">
                            <input type="number" class="cantidad" id="cantidad" name="cantidad" min="1" size="4" value="1">
                        </div>
                        <input type="hidden" name="id_producto" id="id_producto" value="{{$producto->id}}">
                        <div class="col-sm-9">
                            <button class="boton-añadir" type="submit" name="añadir" value="añadir">Añadir al carrito</button>

                        </div>
                    </form>
                    <span>Categoría: <a href="#" class="categoria-producto" style="color: #6931f9">{{$producto->categoria}}</a></span>
                </div>



            </div>
            @if(Auth::check())

                @if(auth()->user()->rol == 'admin')


                    <div class="row mb-5">
                        <div class="col mt-3"  align="center" style="color: white">
                            <a type="button" class="boton-añadir" data-toggle="modal" data-target="#modalEditarProducto" style="display:inline">
                                <i class="fas fa-edit"></i>
                                Editar producto
                            </a>
                        </div>

                        <div class="col mt-3"  align="center" style="color: black">
                            <a type="button" href="{{url('eliminar-producto/'.$producto->id)}}" class="boton-añadir" style="display:inline" >
                                <i class="fas fa-trash-alt"></i>
                                Eliminar producto
                            </a>
                        </div>
                    </div>

                @endif

            @endif

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



    <form method="POST" action="{{url('editar-producto/'.$producto->id)}}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="nombreEditarProducto" name="nombreEditarProducto" class="form-control validate" value="{{$producto->nombre}}" required>
                            <label data-error="wrong" data-success="right" for="nombreEditarProducto">Nombre</label>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="number" step=0.01 id="precioEditarProducto" name="precioEditarProducto" class="form-control validate" value="{{$producto->precio}}" required>
                            <label data-error="wrong" data-success="right" for="precioEditarProducto">Precio</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="descripcionEditarProducto" name="descripcionEditarProducto" class="md-textarea form-control mb-5" rows="3" required>{{$producto->descripcion}}</textarea>
                            <label data-error="wrong" data-success="right" for="descripcionEditarProducto">Descripción</label>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="fotoEditarProducto" name="fotoEditarProducto" class="form-control validate" value="{{$producto->foto}}" required>
                            <label data-error="wrong" data-success="right" for="fotoEditarProducto">Foto (url de la foto)</label>
                        </div>


                        <div class="md-form">
                            <i class="fas fa-pencil prefix grey-text"></i>
                            <input type="text" id="categoriaEditarProducto" name="categoriaEditarProducto" class="form-control validate" value="{{$producto->categoria}}" required>
                            <label data-error="wrong" data-success="right" for="categoriaEditarProducto">Categoría (teclado, portatil...)</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn purple-gradient">Editar Producto <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

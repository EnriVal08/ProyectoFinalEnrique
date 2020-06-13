@extends('layouts.master')
@section('content')

    <style>

        h5{
            font-weight: bold;
            font-size: 18px;
            color: #6931f9;
        }

        .pagina-perfil{
            margin-top: 150px;
            padding: 50px;
        }

        .datos-perfil p{
            color: grey;
            font-size: 16px;

        }

    </style>

    <section class="pagina-perfil">
    @if($errors->any())

        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>No has rellenado correctamente el formulario de editar perfil:</strong>
            <hr>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                <hr>
            @endforeach
        </div>
    @endif
        <div class="mx-auto" style="max-width: 500px; text-align: center">
            @include('flash::message')

        </div>
    <div class="row my-2 mt-3">
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="{{$usuario->avatar}}" class="mx-auto img-fluid img-circle d-block" width="120" alt="avatar">
            <h6 class="mt-2">Éste es tu avatar</h6>
        </div>
        <div class="col-lg-8 order-lg-2">

            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="home"
                       aria-selected="true">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#modificar" role="tab" aria-controls="profile"
                       aria-selected="false">Modificar Perfil</a>
                </li>
            </ul>





            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-12 datos-perfil">
                            <h6>Nombre</h6>
                            <p>
                                {{$usuario->nombre}}
                            </p>
                            <h6>Email</h6>
                            <p>
                                {{$usuario->email}}
                            </p>
                            <h6>Rol</h6>
                            <p>
                                {{$usuario->rol}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="modificar" role="tabpanel" aria-labelledby="profile-tab">

                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="nombre" value="{{$usuario->nombre}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="{{$usuario->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Avatar</label>
                            <div class="col-lg-9">
                                <input type="file" name="foto">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Restablecer valores">
                                <input type="submit" class="btn btn-primary"  value="Guardar Cambios">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    </section>

@endsection

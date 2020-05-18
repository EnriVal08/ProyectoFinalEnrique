@extends('layouts.master')
@section('content')


    <style>
        .tienda{
            margin-top: 120px;
            margin-bottom: 100px;
        }

        .card-body{
            text-align: center;

        }


    </style>
    <div class="row tienda justify-content-md-center">
    @foreach( $productos as $producto)
            <div class="card col-lg-2 mx-auto mb-5">

                <div class="view overlay">
                    <img class="card-img-top" src="{{$producto->foto}}"
                         alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body">

                    <h4 class="card-title">{{$producto->nombre}}</h4>

                    <p class="card-text">{{$producto->precio}} €</p>

                    <a href="#" class="btn btn-primary">Saber más</a>


                </div>

            </div>
    @endforeach
</div>

@endsection



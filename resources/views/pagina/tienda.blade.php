@extends('layouts.master')
@section('content')

    <div class="row tienda justify-content-md-center pl-3 pr-3 pb-0">


    @foreach( $productos as $producto)
                <div class="card col-lg-2 mx-auto mb-5">

                    <div class="view overlay">
                        <img class="card-img-top" src="{{$producto->foto}}"
                             alt="{{$producto->nombre}}">
                        <a href="{{url('/producto/'.$producto->id)}}">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="card-body">

                        <h4 class="card-title">{{$producto->nombre}}</h4>

                        <p class="card-text font-weight-bolder">{{$producto->precio}} €</p>

                        <a href="{{url('/producto/'.$producto->id)}}" class="btn boton-añadir">Saber más</a>


                    </div>

                </div>

        @endforeach

</div>
    <div class="tienda paginas">
        <div class="margen">
            {{ $productos->links('/vendor/pagination/bootstrap-4') }}
        </div>
    </div>

@endsection



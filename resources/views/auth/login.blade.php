@extends('layouts.master')

@section('content')



<section class="login-register">

    <div  style="padding-top: 120px; margin-bottom: 10px">
        <div class="mx-auto" style="max-width: 500px; text-align: center">
            @include('flash::message')

        </div>

        @if($errors->any())

            <div class="alert alert-danger alert-dismissable mx-auto" style="max-width: 500px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error en el Login:</strong>
                <hr>
                    <li>No hay ningún usuario con ese email y contraseña</li>
                    <hr>
            </div>
        @endif


    </div>

<div class="login-register-box">


    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
@csrf



        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}" required >
        </div>

        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input id="password" type="password" placeholder="Contraseña" name="password" value="">
        </div>

        <button type="submit" class="boton-sign" name="">Sign in</button>

    </form>
</div>

</section>


@endsection

@extends('layouts.master')

@section('content')


    @include('flash::message')
    <section class="login-register">

        <div class="login-register-box">
            <h1>Registro</h1>

            <form method="POST" action="{{ route('registrarUsuario') }}">
                @csrf


                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input id="nombre" type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                </div>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}" required >
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input id="password" type="password" placeholder="Contraseña" name="password" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input id="password-confirm" type="password" placeholder="Repetir contraseña"  name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="boton-sign" name="">Sign up</button>

            </form>
        </div>

    </section>
@endsection

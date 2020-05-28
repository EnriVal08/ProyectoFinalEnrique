@extends('layouts.master')

@section('content')



<section class="login-register">

<div style="padding-top: 120px">
    @include('flash::message')
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

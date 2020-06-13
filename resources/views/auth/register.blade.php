@extends('layouts.master')

@section('content')
<style>

    .fileUpload{
        margin: 1.25em auto;/*20px/16px 0*/
        margin-top: 20px !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
        overflow: hidden;
        padding: 0.875em;/*14px/16px*/
        position: relative;
        text-align: center;
    }

    #select{
        padding: 16px;
        border: 2px solid #6931f9;
        border-radius: 48px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        color: #6931f9;
        max-width: 250px;
        font-size: 13px;
        position: relative;
    }

    #select:hover{
        transform: scale(1.04);
    }

    #select.activo{
        background-color: #6931f9;
        color: #242424;
        font-size: 10px !important;
        width: 100%;

    }

    #selector span{
        font-weight: normal;
    }

</style>

    <section class="login-register">

        <div  style="padding-top: 120px; margin-bottom: 10px">
            <div class="mx-auto" style="max-width: 500px; text-align: center">
                @include('flash::message')

            </div>

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


        </div>

        <div class="login-register-box">
            <h1>Registro</h1>

            <form method="POST" action="{{ route('registrarUsuario') }}" enctype="multipart/form-data">
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
                    <input class= "pl-4" style="font-size: 15px" type="text" placeholder="(min. 8 carácteres)" readonly>
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input id="password-confirm" type="password" placeholder="Repetir contraseña"  name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Avatar (opcional)" readonly>

                    <div class="fileUpload">
                        <input type="file" name="foto" id="file" value="" hidden accept=".jpg,.png" onchange="validar()">
                        <label for="file" id="select">Seleccionar archivo (.png .jpg)</label>
                    </div>
                </div>


                <button type="submit" class="boton-sign" name="">Sign up</button>

            </form>
        </div>

    </section>
<script>
    var loader=function (e) {
        const file=e.target.files;
        const show="<span>Archivo seleccionado: </span>"+file[0].name;
        const output=document.getElementById("select");
        output.innerHTML=show;
        output.classList.add("activo");
    };
    const fileInput=document.getElementById("file");
    fileInput.addEventListener("change", loader);

    function validar() {

        let archivo = document.getElementById('file').value,

            extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);

        if(document.getElementById('file').getAttribute('accept').split(',').indexOf(extension) < 0) {
            alert('Archivo inválido. No se permite la extensión ' + extension);
        }
    }

</script>

@endsection

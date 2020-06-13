<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">



    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

    <title>GAMID</title>
</head>

<body>
@php
    use App\Juego;$juegos=Juego::all();
@endphp
@include('partials.navbar', array('juegos' => $juegos))

<div>
    @yield('content')
</div>
@php
use App\Noticia;$ultimas_noticias=Noticia::take(5)->orderby('id', 'DESC')->get();
@endphp
@include('partials.footer', array('ultimas_noticias'=>$ultimas_noticias))



<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function () {

        $('.btn-update-item').on('click', function (e) {

                e.preventDefault();


                const id = $(this).data("id");


                const href = $(this).data('href');


                const cantidad = $("#product_" + id).val();


                console.log("url="+href + "/" + cantidad);

                window.location.href = href + "/" + cantidad;
            });

    });


    $(document).ready(function(){
        $("#botonocultamuestra").click(function(){
            $("#divocultamuestra").each(function() {
                displaying = $(this).css("display");
                if(displaying == "block") {
                    $(this).fadeOut('slow',function() {
                        $(this).css("display","none");
                    });
                } else {
                    $(this).fadeIn('slow',function() {
                        $(this).css("display","block");
                    });
                }
            });
        });
    });



</script>
</body>
</html>

<style>
    a.dropdown-item:hover{
        background-color: white;
        width: 100%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark gris scrolling-navbar fixed-top">

    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Gamid</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('noticias')}}">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('torneos') }}">Torneos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('tienda') }}">Tienda</a>
                </li>

                <li>
                    <div class="ml-3"></div>
                </li>

                @if( Auth::check() )

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cesta') }}">Cesta</a>
                    </li>


                    <li class="nav-item dropdown mt-2">
                        <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" width="44px" src="{{asset(auth()->user()->avatar)}}">
                        </a>

                        <div class="dropdown-menu dropdown-primary pl-2 mr-2" aria-labelledby="navbarDropdownMenuLink">
                                <form action="{{ url('/logout') }}" method="POST" class=" w-100 mr-5">
                                    {{ csrf_field() }}
                                    <button type="submit" class="boton-añadir mt-1">
                                        Cerrar sesión
                                    </button>
                                </form>
                            <a class="dropdown-item w-100 mt-3" href="{{url('perfil')}}">Perfil</a>
                            <a class="dropdown-item w-100" href="{{url('historialPedidos')}}">Historial de pedidos</a>

                            @if(auth()->user()->rol == 'admin')
                                <a type="button" data-toggle="modal" data-target="#modalAñadirJuego" class="btn boton-añadir mb-3 " style="display:inline; color: white">
                                    <i class="fas fa-gamepad"></i>
                                    Añadir juego
                                </a>

                                <a type="button" data-toggle="modal" data-target="#modalAñadirNoticia" class="btn boton-añadir mb-3 " style="display:inline; color: white">
                                    <i class="fas fa-newspaper"></i>
                                    Añadir noticia
                                </a>
                                <a type="button" data-toggle="modal" data-target="#modalAñadirTorneo" class="btn boton-añadir mb-3 " style="display:inline; color: white">
                                    <i class="fas fa-trophy"></i>
                                    Añadir torneo
                                </a>
                                <a type="button" data-toggle="modal" data-target="#modalAñadirProducto" class="btn boton-añadir mb-3 " style="display:inline; color: white">
                                    <i class="fas fa-shopping-cart"></i>
                                    Añadir producto
                                </a>
                            @endif



                        </div>

                    </li>
                    @endif

                @if( Auth::check() == false )


                    <li class="nav-item">
                        <button type="button" onclick="location.href='{{ url('login') }}'" class="boton-añadir mt-1">
                            Login
                        </button>
                    </li>

                    <li class="nav-item">
                        <button type="button" onclick="location.href='{{ url('register') }}'" class="boton-añadir mt-1">
                            Registro
                        </button>
                    </li>

                @endif


            </ul>
        </div>
    </div>


</nav>

<!-- Añadir juego   -->
<form method="POST" action="{{route('añadir-juego')}}" enctype="multipart/form-data">

    {{csrf_field()}}

    <div class="modal fade" id="modalAñadirJuego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Juego</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="nombreJuego" name="nombreJuego" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="nombreJuego">Nombre</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="tituloJuego" name="tituloJuego" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="tituloJuego">Título</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="descripcionJuego" name="descripcionJuego" class="md-textarea form-control" rows="3" required></textarea>
                        <label data-error="wrong" data-success="right" for="descripcionJuego">Descripción</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fotoJuego" name="fotoJuego" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="fotoJuego">Foto (url de la foto)</label>
                    </div>


                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="videoJuego" name="videoJuego" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="videoJuego">Vídeo (url del vídeo embed)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <span class="pl-4 ml-3">Logo</span>
                        <br>
                        <input type="file" name="logoJuego">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn purple-gradient">Añadir Juego <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>



<!-- Añadir noticia -->
<form method="POST" action="{{route('añadir-noticia')}}">

    {{csrf_field()}}

    <div class="modal fade" id="modalAñadirNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Noticia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="tituloNoticia" name="tituloNoticia" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="tituloNoticia">Titulo</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="descripcionNoticia" name="descripcionNoticia" class="md-textarea form-control" rows="3" required></textarea>
                        <label data-error="wrong" data-success="right" for="descripcionNoticia">Descripción</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fechaNoticia" name="fechaNoticia" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="fechaNoticia">Fecha (Ej: 04 de mayo de 2020)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fotoNoticia" name="fotoNoticia" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="fotoNoticia">Foto (url de la foto)</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn purple-gradient">Añadir Noticia <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>



<!-- Añadir torneo-->
<form method="POST" action="{{route('añadir-torneo')}}">

    {{csrf_field()}}

    <div class="modal fade" id="modalAñadirTorneo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Torneo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="tituloTorneo" name="tituloTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="tituloTorneo">Titulo</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <span class="pl-4 ml-3">Juego</span>

                        <select class="form-control validate" style="margin-left: 37px; margin-top: 10px; width: 90%" id="id_juego" name="id_juego">
                            @foreach($juegos as $juego)
                                <option value="{{$juego->id}}">{{$juego->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fechaTorneo" name="fechaTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="fechaTorneo">Fecha (Ej: 04/11/2020)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="fotoTorneo" name="fotoTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="fotoTorneo">Foto (url de la foto)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="ubicacionTorneo" name="ubicacionTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="ubicacionTorneo">Ubicación (Ej: Madrid, España)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="descripcionTorneo" name="descripcionTorneo" class="md-textarea form-control" rows="3" required></textarea>
                        <label data-error="wrong" data-success="right" for="descripcionTorneo">Descripcion</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="number" id="premioTorneo" name="premioTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="premioTorneo">Premio (€)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="logoTorneo" name="logoTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="logoTorneo">Logo (url de la foto)</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="text" id="linkTorneo" name="linkTorneo" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="linkTorneo">Link del torneo (url de la página)</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn purple-gradient">Añadir Torneo <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="POST" action="{{route('añadir-producto')}}">

{{csrf_field()}}

<div class="modal fade" id="modalAñadirProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <input type="text" id="nombreProducto" name="nombreProducto" class="form-control validate" required>
                    <label data-error="wrong" data-success="right" for="nombreProducto">Nombre</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <input type="number" step=0.01 id="precioProducto" name="precioProducto" class="form-control validate" required>
                    <label data-error="wrong" data-success="right" for="precioProducto">Precio</label>
                </div>

                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="descripcionProducto" name="descripcionProducto" class="md-textarea form-control" rows="3" required></textarea>
                    <label data-error="wrong" data-success="right" for="descripcionProducto">Descripción</label>
                </div>

                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <input type="text" id="fotoProducto" name="fotoProducto" class="form-control validate" required>
                    <label data-error="wrong" data-success="right" for="fotoProducto">Foto (url de la foto)</label>
                </div>


                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <input type="text" id="categoriaProducto" name="categoriaProducto" class="form-control validate" required>
                    <label data-error="wrong" data-success="right" for="categoriaProducto">Categoría (teclado, portatil...)</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn purple-gradient">Añadir Producto <i class="fas fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>
</form>



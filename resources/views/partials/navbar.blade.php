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

                    <li><form action="{{ url('/logout') }}" method="POST" >
                            {{ csrf_field() }}
                            <button type="submit" class="boton-añadir mt-1" style="">
                                Cerrar sesión
                            </button>
                        </form>
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



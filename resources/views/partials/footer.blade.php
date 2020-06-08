<footer>
    <div class="container">
        <div class="footer-contenido">
            <div class="footer-apartado-logo">
                <div class="cajaLogo">
                    <a href="{{url('/')}}" class="logo" rel="home">
                        <img src="{{ asset('images/BrawlStars(LogoParaPruebas).png') }}" alt="Logo Gamid">
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-apartado contacto">
                <ul>
                    <li class="tituloFooter">
                        Contacto
                    </li>
                    <li>
                        <i class="fas fa-bell"></i>
                        <div class="detalles">
                            <span>Media</span>
                            <a>enriquevalverde45@gmail.com</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="footer-apartado footer-noticias">
                <ul>
                    <li class="tituloFooter">
                        Ultimas noticias
                    </li>
                    @foreach($ultimas_noticias as $noticia)
                    <li class="footer-noticia">
                        <a href="{{url('/noticia/'.$noticia->id)}}">{{$noticia->titulo}}</a>
                    </li>
                    @endforeach
                    <li class="todas-noticias">
                        <a href="{{url('/noticias')}}">Ver todas las noticias <i class="fas fa-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
            <div class="footer-apartado footer-menu">
                <ul>
                    <li class="tituloFooter">
                        Menu 1
                    </li>
                    <li>
                        <a href="{{url('torneos')}}">
                            <span>Torneos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('equipos')}}">
                            <span>Equipos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('jugadores')}}">
                            <span>Jugadores</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-apartado footer-menu">
                <ul>
                    <li class="tituloFooter">
                        Menu 2
                    </li>
                    <li>
                        <a href="{{url('noticias')}}">
                            <span>Noticias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('tienda')}}">
                            <span>Tienda</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ubicacion">
            <div class="info">
                    <span class="ciudad">
                        <i class="fas fa-map-marker-alt"></i>
                        Lucena, Córdoba
                    </span>
                <span class="domicilio">
                        C/Tras la Parra
                    </span>
            </div>
        </div>
    </div>
    <div class="barra-footer">
        <div class="container">
            <div class="volver-arriba">
                <i class="fas fa-angle-up"></i>
            </div>
            <div class="copyright">
                <p>
                    GAMID es una página web creada por Enrique Valverde
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.querySelector('.volver-arriba')
        .addEventListener('click', () =>{
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
</script>

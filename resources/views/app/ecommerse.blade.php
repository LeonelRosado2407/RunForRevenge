<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>RUN FOR REVENGE</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/app/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/app/ionicons.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('public/app/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('public/app/startbootstrap-shop-homepage-gh-pages/css/styles.css')}}" rel="stylesheet" />

@yield('estilos')
@yield('style')
    </head>
    
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(173, 89, 80);">
            <div class="container px-4 px-lg-5" >
                <a class="navbar-brand text-black" href="#!">@yield('titulo')</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">                        
                    </ul>
                    <form class="d-flex" action="{{action('TiendaController@listado')}}" method="GET">
                        {{csrf_field()}}    
                        <button class="btn btn-outline-dark text-black" type="submit">
                            <i class="">Tienda</i>
                        </button>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="http://localhost/run-for-revenge/Buscador/jugadores">Buscar Amigos</a></li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="http://localhost/run-for-revenge/user/perfil">perfil</a></li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 text-black">
                        <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="http://localhost/run-for-revenge/Home">Home</a></li>
                        </ul>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 text-black">
                        <li class="nav-item"><a class="nav-link active text-black" aria-current="page" href="http://localhost/run-for-revenge/">Cerrar Sesión</a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        @yield('contenido','')
        <!-- Header-->
        <!-- Section-->
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Run For Revenge 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <!-- jQuery -->
        <script src="{{asset('public/app/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('public/app/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('public/app/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('public/app/demo.js')}}"></script>
        <script src="{{asset('public/vue.js')}}"></script>
        @yield('javascripts')
        @yield('script')
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RUN FOR REVENGE</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('public/Homeresources/styles.css')}}" rel="stylesheet" />
       
    </head>
    <body id="page-top" style="background-color: rgb(141, 209, 216);">
        <!-- Navigation-->
        <div id="app" style="background-color: rgb(141, 209, 216);">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: rgb(173, 89, 80);">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="#page-top">Run for Revenge</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ action('TiendaController@listado', ['iduser'=>1]) }}" >Tienda</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ action('PerfilController@perfil', ['iduser'=>1]) }}" >Perfil</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Masthead-->
            <header class="masthead">
                <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <h1 class="mx-auto my-0 text-uppercase">RUN FOR REVENGE</h1>
                            <h2 class="text-white-50 mx-auto mt-2 mb-5">Descripción del juego</h2>
                            <img  src="{{asset('public/Homeresources/logo.png')}}" alt="">
                 {{-- <a class="btn btn-primary" href="#about"></a> --}}
                        </div>
                    </div>
                </div>
            </header>
            <div  class="about-section">
                <h2 class="text-white mb-4"><center>Records Global</center></h2>
                <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                    <table class="table table-striped" style="background-color: rgb(246, 243, 190);">
                        <tr>
                            <th>Top</th>
                            <th>Username</th>
                            <th>Record</th>                        
                        </tr>
                        <tr v-for = "(elemento,indice) in record_g ">
                            <td>@{{indice+1}}</td>
                            <td>@{{elemento.username}}</td>
                            <td>@{{elemento.score}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!-- Projects-->
            <section class="projects-section bg-light" id="projects">
                <div class="container px-4 px-lg-5" >
                    <!-- Project One Row-->
                    <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                        <div class="col-lg-6"><img class="img-fluid" src="" alt="..." /></div>
                        <div class=" background-image col-lg-6" >
                            <div class="text-center h-100 project">
                                <div class="background-image d-flex h-100" >
                                    <div class="background-image project-text w-100 my-auto text-center text-lg-left">
                                        <h2 class="text-Black">Record Amigos</h2>
                                        <table  class="table table-striped " style="background-color: rgb(246, 243, 190);">
                                            <tr>
                                                <th>Username</th>
                                                <th>Record</th>
                                            </tr>
                                            <tr v-for = "elemento in record_f">
                                                <td>@{{elemento.amigo}}</td>
                                                <td>@{{elemento.recordamigo}}</td>
                                            </tr>
                                        </table>
                                        {{-- <h4 class="text-white">Misty</h4>
                                        <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                        <hr class="d-none d-lg-block mb-0 ms-0" /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div></footer>
        <!-- Bootstrap core JS-->
        <script src="{{asset('public/Homeresources/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('public/Homeresources/scripts.js')}}"></script>

        <script src="{{asset('public/Homeresources/sb-forms-0.4.1.js')}}"></script>
    </body>
    <script src="{{asset('public/app/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/app/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/vue.js')}}"></script>
    <script>
        new Vue({
          el: '#app',
          data:{
            record_g:<?php echo json_encode($record_g);?>
            ,record_f:<?php echo json_encode($record_f);?>
        
            // ,url_editar:'{{action("RolController@formulario")}}'
            // ,url_permiso:'{{action("RolxpermisoController@formulario")}}'
          }
          ,methods:{}
           });
    </script>
    <style>
       .background-image {
             background-image: url(../public/Homeresources/logo.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 400px;
        }
        .content {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 2;
        }
    </style>
</html>

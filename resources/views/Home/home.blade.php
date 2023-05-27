@extends('app.ecommerse')

@section('titulo')
Bienvenido
@endsection
@section('style')
<style>
  .image {
    background-image: url(../public/Homeresources/Fondo.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .content {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 2;
        }

.marco{
    image: url(../public/Homeresources/marco3.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
 }


</style>
@endsection

@section('contenido')

<body>
    <section>
        <div class="bg-image"   style="height: 600px;background-image: url('{{ asset('public/Homeresources/fo2.png') }}');background-position: center;background-size: contain;"> 
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div style="max-width: 350px;">
                            <h1 class="text-uppercase fw-bold">Bienvenido a<br /></h1>
                            <p class="my-3">Hola usuario de run for revenge que Bueno que pasas por aquí, visita la tienda tenemos skins especiales para tí o revisa quíen es top global actualmente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="app" class="container d-flex flex-column align-items-center py-4 py-xl-5" style="background-color: rgb(141, 209, 216);">
        <div class="row mb-5" style="background-color: rgb(141, 209, 216);">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Mejores Récords</h2>
                <p>Juega y consigue llegar al top 10 global, solo los mejores pueden lograrlo , Tienes la habilidad para lograrlo?</p>
            </div>
        </div>
        <div class="row gy-4 w-100" style="max-width: 800px;">
            <div class="col-12 col-md-6">
                <div class="card"><img class="card-img w-100 d-block" src="{{asset('public/Homeresources/marco3.png')}}" />
                    <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center p-4">
                        <h4>Records Globales</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Top</th>
                                        <th>User</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for = "(elemento,indice) in record_g ">
                                        <td>@{{indice+1}}</td>
                                        <td>@{{elemento.username}}</td>
                                        <td>@{{elemento.score}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card"><img class="card-img w-100 d-block" src="{{asset('public/Homeresources/marco3.png')}}" />
                    <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center p-4">
                        <h4>Records Amigos</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Amigo</th>
                                        <th>score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for = "elemento in record_f">
                                        <td>@{{elemento.amigo}}</td>
                                        <td>@{{elemento.recordamigo}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('script')  
  <script>
    new Vue({
      el: '#app',
      data:{

        record_g:<?php echo json_encode($record_g);?>
        ,record_f:<?php echo json_encode($record_f);?>
        

      }
      ,methods:{}
       });
  </script>
@endsection
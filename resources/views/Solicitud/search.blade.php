<!DOCTYPE html>
<html>
  <head>
    <title>Buscador de Jugadores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('public/stylebuscador.css')}}" rel="stylesheet" />
    <link href="{{asset('public/Homeresources/styles.css')}}" rel="stylesheet" />
  </head>
  <!-- Coded with love by Mutiullah Samim-->
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
    <div class="container h-50">
      <div class="d-flex justify-content-center h-100">
        <form class="d-flex justify-content-center h-100" action="{{action('SolicitudController@buscador')}}" method="POST">
            {{csrf_field()}}
            <div class="searchbar">
                <input class="search_input" type="text" name="criterio" value="{{$criterio}}" placeholder="Search...">
                <a href="{{action('SolicitudController@buscador')}}" method="POST" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </form>
      </div>
    </div>
    <div id="app" class="container h-100">
        <div v-if="user.length!=0" class="col-md-12 col-xs-12 col-sm-12">
            <h1 class="text-center">Resultado de Búsquedas</h1>
            <table class=" table table-borderless">
            <tr>
                <th><h3>id</h3></th>
                <th class="text-center"><h3>username</h3></th>
                <th>&nbsp;</th>
            </tr>
            <tr v-for="Usuario in user">
                <td class="text-white">@{{Usuario.iduser}}</td>
                <td id="table-td" class="text-white">@{{Usuario.username}}</td>
                <td v-if="" id="table-td"> 
                  <form method="POST" action="{{action('SolicitudController@solicitud')}}">
                    {{csrf_field()}}
                    <button name="idusuario" :value="Usuario.iduser" class="btn btn-success">Agregar amigo</button></td>
                  </form>
            </tr>
            </table>
        </div>
        <div class="container" v-if="status=='No se encontraron jugadores'">
            <h1 class="text-center" ><center>no se hayó Jugadores</center></h1>
        </div>
    </div>
    <script src="{{asset('public/Homeresources/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
    <script src="{{asset('public/Homeresources/sb-forms-0.4.1.js')}}"></script>
    <script src="{{asset('public/Homeresources/scripts.js')}}"></script>
    <script src="{{asset('public/app/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/bootstrap.min.js')}}""></script>
    <script src="{{asset('public/vue.js')}}"></script> 

    <script>
      new Vue({
    el:'#app'
    ,data:{
      user:<?php echo json_encode($user);?>
      ,status:<?php echo json_encode($status);?>
      
    }
    ,methods:{}
    ,computed:{}
    })
    </script>
  </body>
</html>
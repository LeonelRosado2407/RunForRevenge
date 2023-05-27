@extends('app.master')

@section('titulo')
<div>
<h1><center>Buscador de amigos</center></h1>
</div>
@endsection

@section('style')
<link href="{{asset('public/stylebuscador.css')}}" rel="stylesheet" />
@endsection
@section('contenido')

<div class="container h-100">
  <div class="d-flex justify-content-center h-100">
    <form class="d-flex justify-content-center h-100 action="{{action('SolicitudController@buscador')}}" method="POST">
        {{csrf_field()}}
        <div class="searchbar">
            <input class="search_input" type="text" name="criterio" value="{{$criterio}}" placeholder="Search...">
            <a href="http://localhost/run-for-revenge1/Buscador/jugadores" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
    </form>
  </div>
  <div id="app">
    <div v-if="user.length!=0" class="col-md-12 col-xs-12 col-sm-12">
      <h1 class="">Resultado de Búsquedas</h1>
      <table class="table table-condensed">
        <tr>
          <th>id</th>
          <th>username</th>
          <th>&nbsp;</th>
        </tr>
        <tr v-for="Usuario in user">
          <td>@{{Usuario.iduser}}</td>
          <td>@{{Usuario.username}}</td>
          <td> <button class="btn btn-success">Agregar amigo</button></td>
        </tr>
      </table>
    </div>
    <div v-if="status=='No se encontraron jugadores'">
      <h1>no se hayó Jugadores</h1>
    </div>
  </div>
  
  
</div>

@endsection

@section('script')
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
@endsection
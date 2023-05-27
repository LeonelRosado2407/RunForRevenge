@extends('app.master')

@section('titulo')
Records de {{$user->username}}
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
      <div class="col-md-12">
      <form action="{{action('UserController@listado')}}" method="get">
          {{csrf_field()}}
          <button class="btn btn-warning">Regresar</button>  
      </div>
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Partidas</h1>
        <table class="table table-striped">
          <tr>
            <th>Score</th>
            <th>Monedas</th>
            <th>Fecha</th>
          </tr>
          <tr v-for="elemento in lista"> 
            <td>@{{elemento.score}}</td>
            <td>@{{elemento.coins}}</td>
            <td>@{{elemento.fecha_partida}}</td>
          </tr>
        </table>
      </div> 
    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection

@section('script')
  <script>
    new Vue({
      el: '#app',
      data:{
        lista:<?php echo json_encode($lista);?>

      }
      ,methods:{}
       });
  </script>
@endsection
@extends('app.master')

@section('titulo')
Tabla-Status
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Status</h3>
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
        <form action="{{action('StatusController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar Status</button>
        </form>
      </div>
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Status</h1>
        <table class="table table-striped">
          <tr>
            <th>Nombre de Status</th>
          </tr>
          <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idstatus='+elemento.idstatus">@{{elemento.nombre}}</a></td>
          </tr>
        </table>
      </div> 
    </div>
      <!-- /.card -->
@endsection

@section('script') 
  <script>
    new Vue({
      el: '#app',
      data:{
        lista:<?php echo json_encode($lista);?>
        ,url_editar:'{{action("StatusController@formulario")}}'

      }
      ,methods:{}
       });
  </script>
  @endsection
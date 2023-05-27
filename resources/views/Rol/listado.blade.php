@extends('app.master')

@section('titulo')
Roles
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Roles</h3>
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
        <form action="{{action('RolController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar una Rol</button>
        </form>
      </div>
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Roles</h1>
        <table class="table table-striped">
          <tr>
            <th>Nombre</th>
            <th>&nbsp;</th>
          </tr>
          <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idrol='+elemento.idrol">@{{elemento.nombre}}</a></td>
            <td><a :href="url_permiso+'?idrol='+elemento.idrol">permisos</a></td> 
          </tr>
        </table>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-2">
        <form action="{{action('RolController@listado')}}" method="get">
          {{csrf_field()}}
          <button class="btn btn-warning">Inicio</button>
        </form>
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
        ,url_editar:'{{action("RolController@formulario")}}'
        ,url_permiso:'{{action("RolxpermisoController@formulario")}}'


      }
      ,methods:{}
       });
  </script>
  @endsection

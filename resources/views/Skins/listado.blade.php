@extends('app.master')

@section('titulo')
Tabla-Skins
@endsection

@section('style')
<style>
 .background-image {
             background-image: url(../public/Homeresources/marco.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 400px;
        }
</style>
@endsection


@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header" >
          <h3 class="card-title">Skins</h3>
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
        <form action="{{action('SkinsController@formulario')}}" method="POST">
          {{csrf_field()}}
          <button class="btn btn-success">Agregar Skins</button>
        </form>
      </div>
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>SKINS</h1>
        <table class="table table-striped">
          <tr>
            <th>Nombre de la skin</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Descripcion</th>
            <th>Categoria</th>
          </tr>
          <tr v-for="elemento in lista">
            <td><a :href="url_editar+'?idskins='+elemento.idskins">@{{elemento.skinname}}</a></td> 
            <td>@{{elemento.price}}</td>
            <td>
              <img :src="'{{URL::to('/')}}/'+ elemento.foto" width="100" alt="">
            </td>
            <td>@{{elemento.descrip}}</td>
            <td>@{{elemento.nombre_categoria}}</td>
          </tr>
        </table>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-2">
        <form action="{{action('SkinsController@listado')}}" method="get">
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
        ,url_editar:'{{action("SkinsController@formulario")}}'

      }
      ,methods:{}
       });
  </script>
  @endsection
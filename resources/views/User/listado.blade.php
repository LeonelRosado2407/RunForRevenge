@extends('app.master')

@section('titulo')
USERS
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Listado User</h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
           <div class="row">
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Tabla de Users</h1>
        <table class="table table-striped">
          <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Coins</th>
            <th>wardrobes</th>
            <th>Records</th>
            <th>Compras</th>
            <th>Amigos</th>
          </tr>
          <tr v-for="elemento in lista">
            <td>@{{elemento.username}}</td>
            <td>@{{elemento.email}}</td>
            <td><a :href="url_coins+'?iduser='+elemento.iduser">Coins</a></td>
            <td><a :href="url_wardrobe+'?iduser='+elemento.iduser">wardrobe</a></td>
            <td><a :href="url_record+'?iduser='+elemento.iduser">Records</a></td>
            <td><a :href="url_orden+'?iduser='+elemento.iduser">Compras</a></td>
            <td><a :href="url_friend+'?iduser='+elemento.iduser">Amigos</a></td>   
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
        ,url_coins:'{{action("CoinsController@listado")}}'
        ,url_wardrobe:'{{action("WardrobeController@listado")}}'
        ,url_record:'{{action("RecordController@listado")}}'
        ,url_orden:'{{action("OrdenController@listado")}}'
        ,url_friend:'{{action("FriendsController@listado")}}'
        
        

      }
      ,methods:{}
       });
  </script>
@endsection
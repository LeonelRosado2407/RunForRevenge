@extends('app.master')
@section('titulo')
Nuevo Usuario
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Agrega el nuevo usuario</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
           <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <form enctype="multipart/form-data" action="{{action('Auth\RegisterController@register')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="iduser" value="">
          <div class="form-group">
          <label class="form-label" form="">username
          </label>
          <input type="text" v-model="username" name="username" class="form-control">
        </div> 
          <div class="form-group">
          <label class="form-label" form="">Email/Correo
          </label>
          <input type="text" v-model="email" name="email" class="form-control">
        </div> 
        <div class="form-group">
          <label class="form-label" form="">Password/Contraseña
          </label>
          <input type="Password" v-model="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label" form="">Rol
          </label>
          <select v-model="idrol" name="idrol" class="form-control">
            <option value="3">usuario</option>
            <option value="2">admin</option>
            <option value="1">papa</option>
          </select>
        </div>
        <input type="submit" class="btn btn-success" name="operacion" value="Registrar">
        <input type="submit" class="btn btn-warning" name="operacion" value="Cancelar">  
        </form>
      </div>
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

      }
      ,methods:{
        
        
      }
       });
  </script>
@endsection


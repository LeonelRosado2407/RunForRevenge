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
          <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Agrega el Rol</h1>
        <form action="{{action('RolController@save')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="idrol" class="form-control" value="{{$rol->idrol}}"> 
        <div class="form-group">
          <label class="form-label" form="">Nombre del Rol
          </label>
          <input type="text" v-model="nombre" name="nombre" class="form-control">
        </div>
        <div v-if="bandera==1" class="alert alert-warning" role="alert">
          @{{mensaje}}
        </div>
        <input type="submit" @click="validar_formulario($event)" class="btn btn-success" name="operacion" value="{{$operacion}}">
        @if($operacion=='Editar')
        <input type="submit" @click="confirmar_eliminar($event)" class="btn btn-warning" name="operacion" value="Eliminar">
        @endif
        <input type="submit" class="btn btn-danger" name="operacion" value="Cancelar">
        </form>
      </div>
    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
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
        nombre:'{{$rol->nombre}}'
        ,bandera:0
        ,mensaje:''

      }
      ,methods:{

        confirmar_eliminar:function(event)
        {
          if(!confirm("Desea eliminar el Rol?"))
          event.preventDefault();

        }
        ,validar_formulario:function(event)
        {
          //usar la tecnica de la bandera
          this.bandera=0;
          this.mensaje='';
          //vamos a prender la bandera si un campo no esta bien llenado
          if(this.nombre=='')
          {
            this.bandera=1;
            this.mensaje+='El nombre no puede estar vacio ';

          }

          if(this.bandera==1)
          {
            event.preventDefault();
          }
        }
      }
       });
  </script>
@endsection


@extends('app.master')

@section('titulo')
Permisos
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Formulario de permisos</h3>
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
        <h1>Agrega el tipo nuevo permiso</h1>
        <form action="{{action('PermisoController@save')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="idpermiso" class="form-control" value="{{$permiso->idpermiso}}"> 
        <div class="form-group">
          <label class="form-label" form="">Permiso
          </label>
          <input type="text" v-model="nompermiso" name="nompermiso" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label" form="">Clave
          </label>
          <input type="text" v-model="clave" name="clave" class="form-control">
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
        nompermiso:'{{$permiso->nompermiso}}'
        ,clave:'{{$permiso->clave}}'
        ,bandera:0
        ,mensaje:''

      }
      ,methods:{

        confirmar_eliminar:function(event)
        {
          if(!confirm("Desea eliminar el permiso?"))
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


    

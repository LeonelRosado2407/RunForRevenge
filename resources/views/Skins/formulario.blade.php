@extends('app.master')

@section('titulo')
Formulario-Skin
@endsection

@section('style')
<style>
      #dropzone
      {
       border-radius:6px ;
       padding: 25px ;
       border-width: 2px;
       border-style: dashed;

      }

      .inactivo
      {
       background-color: #C5CAE9;
       border-color: #00BFA5;
      }
      .conarchivo
      {
       background-color: #3F51B5;
       border-color: #00BFA5;
      }
      .leave
      {
        background-color: #536DFE;
        border-color: #00BFA5;
      }
      .invalido
      {
        background-color:#EF9A9A;
       border-color:#F44336;
      }
      #foto
      {
        display:none ;
      }
      #carga_file
      {
        cursor: pointer;
      }
      #quitar
      {
        cursor: pointer;
      }

    </style>     
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Nueva skin</h3>
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
        <form enctype="multipart/form-data" action="{{action('SkinsController@save')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="idskins" class="form-control" value="{{$skins->idskins}}">
          <div class="form-group">
          <label class="form-label" form="">Nombre
          </label>
          <input type="text" v-model="skinname" name="skinname" class="form-control">
        </div> 
        <div class="form-group">
          <label class="form-label" form="">price
          </label>
          <input type="text" v-model="price" name="price" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label" for="">Fotografia</label>
          <input type="file" 
          name="foto" 
          class="form-control" 
          id="foto"
          ref="campo"
          @change="cambiar"
          >
          <div id="dropzone"
               @dragover="sobre($event)"
               @dragleave="fuera($event)"
               @drop="drop($event)"
               :class="clase"
          >
            Deposita el archivo, o hacer click <label class="form-label" id="carga_file" for="foto"><strong>Aqui</strong></label>
            <div v-show="nombre_archivo!=''">
              <span><strong>@{{nombre_archivo}}</strong></span> <a @click="remove" id="quitar" >Quitar</a>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" form="">Descripcion
          </label>
          <input type="text" v-model="descrip" name="descrip" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label" form="">Categoria
          </label>
          <select v-model="idcategoria" name="idcategoria" class="form-control">
            <option v-for="categoria in categoria" :value="categoria.idcategoria">@{{categoria.nombre_categoria}}</option>
          </select>
        </div>
        <img :src="url" width="200" alt="" ><br/>
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
        skinname:'{{$skins->skinname}}'
        ,price:'{{$skins->price}}'
        ,tipos_permitidos:['image/jpeg','image/png','image/gif']
        ,idcategoria:'{{$skins->idcategoria}}'
        ,descrip:'{{$skins->descrip}}'
        ,categoria:<?php echo json_encode($categoria);?>
        ,bandera:0
        ,url:'{{URL::to("/")}}/'+'{{$skins->foto}}'
        ,nombre_archivo:''
        ,mensaje:''
        ,clase:
        {
          inactivo:true
          ,conarchivo:false
          ,leave:false
          ,invalido:false


        }

      }
      ,methods:{
        remove:function()
        {
          this.$refs.campo.value='';
          this.nombre_archivo='';
          this.url='';

        },
        cambiar:function()
        {
          ultimo=this.$refs.campo.files.length-1;
          if(this.tipos_permitidos.indexOf(this.$refs.campo.files[ultimo].type)!=-1)
          {
            this.nombre_archivo=this.$refs.campo.files[ultimo].name;
            this.url = URL.createObjectURL(this.$refs.campo.files[ultimo]);
          }
          else
          {
            this.clase.leave=false;
            this.clase.conarchivo=false;
            this.clase.inactivo=false;
            this.clase.invalido=true;
          }

        }
        ,sobre:function(event)
        {
          console.log("sobre")
          event.preventDefault();
          this.clase.leave=false;
          this.clase.conarchivo=true;
          this.clase.inactivo=false;
          this.clase.invalido=false;
        },
        fuera:function(event)
        {
          console.log("fuera")
          event.preventDefault();
          this.clase.leave=false;
          this.clase.conarchivo=false;
          this.clase.inactivo=true;
          this.clase.invalido=false;
        },
        drop:function(event)
        {
          
          event.preventDefault();
          //event es el objeto del eveto que se disparo en este caso
          //data tranfer es un atributo donde se guarda la refernecia al manejo del archivo
          this.$refs.campo.files=event.dataTransfer.files;
          this.clase.leave=true;
          this.clase.conarchivo=false;
          this.clase.inactivo=false;
          this.clase.invalido=false;
          this.cambiar();
        },

        confirmar_eliminar:function(event)
        {
          if(!confirm("Desea eliminar la skin"))
          event.preventDefault();

        }
        ,validar_formulario:function(event)
        {
          //usar la tecnica de la bandera
          this.bandera=0;
          this.mensaje='';
          //vamos a prender la bandera si un campo no esta bien llenado
          if(this.skinname=='')
          {
            this.bandera=1;
            this.mensaje+='El nombre no puede estar vacio ';

          }

          if(this.price=='')
          {
            this.bandera=1;
            this.mensaje+='el precio no puede estar vacio ';
          }

          if(this.idcategoria=='')
          {
            this.bandera=1;
            this.mensaje+='La categoria no puede estar vacio ';
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



    


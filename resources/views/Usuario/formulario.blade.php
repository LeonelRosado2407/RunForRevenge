@extends('app.master')

@section('titulo')
Nuevo Usuario
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
        <form enctype="multipart/form-data" action="{{action('UsuarioController@save')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="iduser" class="form-control" value="{{$user->iduser}}">
          <input type="hidden" name="idrol" class="form-control" value="{{$user->idrol}}">
          <div class="form-group">
          <label class="form-label" form="">Username
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
            <label class="form-label" for="">Foto de perfil</label>
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
          <label class="form-label" form="">Rol
          </label>
          <select v-model="idrol" name="idrol" class="form-control">
            <option v-for="rol in rol" :value="rol.idrol">@{{rol.nombre}}</option>
          </select>
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
        email:'{{$user->email}}'
        ,password:'{{$user->password}}'
        ,username:'{{$user->username}}'
        ,idrol:'{{$user->idrol}}'
        ,rol:<?php echo json_encode($rol);?>
        ,bandera:0
        ,mensaje:''
        ,url:'{{URL::to("/")}}/'+'{{$user->foto}}'
        ,tipos_permitidos:['image/jpeg','image/png']
        ,nombre_archivo:''
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
          if(!confirm("Desea eliminar el usuario"))
          event.preventDefault();

        }
        ,validar_formulario:function(event)
        {
          //usar la tecnica de la bandera
          this.bandera=0;
          this.mensaje='';
          //vamos a prender la bandera si un campo no esta bien llenado
          if(this.email=='')
          {
            this.bandera=1;
            this.mensaje+='El email no puede estar vacio ';

          }

          if(this.password=='')
          {
            this.bandera=1;
            this.mensaje+='El password no puede estar vacio ';
          }

          if(this.rol=='')
          {
            this.bandera=1;
            this.mensaje+='El rol no puede estar vacio ';
          }

          if(this.username=='')
          {
            this.bandera=1;
            this.mensaje+='El username no puede estar vacio ';
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


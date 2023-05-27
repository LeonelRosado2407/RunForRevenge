@extends('app.ecommerse')

@section('titulo')
EDIT-PERFIL
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
.gradient-custom-2 {
/* fallback for old browsers */
background: #fbc2eb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
}
</style>
@endsection

@section('contenido')
<section class="h-100 gradient-custom-2">
  <div id="app" class="container py-5 h-100">
    <div  class="row d-flex justify-content-center align-items-center h-100">
      <div  class="col col-lg-9 col-xl-7">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editor de perfil</h3>
        </div>
        <div class="card-body">
           <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <form enctype="multipart/form-data" action="{{action('PerfilController@save')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="iduser" class="form-control" value="{{$usuario->iduser}}">
          <input type="hidden" name="idrol" class="form-control" value="{{$usuario->idrol}}">
          <div class="form-group">
          <label class="form-label" form="">Username
          </label>
          <input type="text" v-model="username" name="username" class="form-control">
        </div> 
        <div class="form-group">
          <label class="form-label" form="">Email
          </label>
          <input type="text" v-model="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label" form="">password
          </label>
          <input type="password" v-model="password" name="password" class="form-control">
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
        <img :src="url" width="200" alt="" ><br/>
        <div v-if="bandera==1" class="alert alert-warning" role="alert">
          @{{mensaje}}
        </div>
        <input type="submit" @click="validar_formulario($event)" class="btn btn-success" name="operacion" value="{{$operacion}}">
        <input type="submit" class="btn btn-danger" name="operacion" value="Cancelar">
        </form>
      </div>
    </div>
  </div>
        </div>
        
        <!-- /.card-footer-->
      </div>

      </div>
    </div>
  </div>
</section>
@endsection

@section('script')  
  <script>
        new Vue({
      el: '#app',
      data:{
        username:'{{$usuario->username}}'
        ,email:'{{$usuario->email}}'
        ,password:'{{$usuario->password}}'
        ,tipos_permitidos:['image/jpeg','image/png']
        ,bandera:0
        ,url:'{{URL::to("/")}}/'+'{{$usuario->foto}}'
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
          if(!confirm("Desea eliminar el personal"))
          event.preventDefault();

        }
        ,validar_formulario:function(event)
        {
          //usar la tecnica de la bandera
          this.bandera=0;
          this.mensaje='';
          //vamos a prender la bandera si un campo no esta bien llenado
          if(this.username=='')
          {
            this.bandera=1;
            this.mensaje+='El nombre no puede estar vacio ';

          }

          if(this.password=='')
          {
            this.bandera=1;
            this.mensaje+='La edad no puede estar vacio ';
          }

          if(this.email=='')
          {
            this.bandera=1;
            this.mensaje+='El curp no puede estar vacio ';
          }

          if(this.foto=='')
          {
            this.bandera=1;
            this.mensaje+='La ocupacion no puede estar vacio ';
          }
        }
      }
       });

  </script>
@endsection
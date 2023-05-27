@extends('app.ecommerse')

@section('titulo')
PERFIL
@endsection

@section('style')
<style>
  .background-image {
             background-image: url(../public/Homeresources/logo.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 400px;
        }
        .content {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 2;
        }
  .fondofoto{
    background: url(../public/Homeresources/Fondo.png);
  }
.gradient-custom-2 {
/* fallback for old browsers */
background: #fbc2eb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
}
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
background: rgb(141, 209, 216);

/* Chrome 10-25, Safari 5.1-6 */
background: rgb(141, 209, 216);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: rgb(141, 209, 216);
}
</style>
@endsection

@section('contenido')
<section class="h-100 gradient-custom-2 bg-image " id="app" style="height: 600px;background-image: url('{{ asset('public/Homeresources/fo.png') }}');background-position: center;background-size: contain;" >
  <div id="app" class="container  py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center  h-100">
      <div class="col col-lg-9 col-xl-7 " >
        <div class="card border border-success rounded"  style="background-color: rgb(246, 243, 190);" >
          <div class=" background-image rounded-top text-white  d-flex flex-row" style="background-color: rgb(233, 142, 66);">
            <div   v-for="elemento in usuario" class=" ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img :src="'{{URL::to('/')}}/'+ elemento.foto"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1" >
            </div>
            <div  v-for="elemento in usuario" class="ms-3" style="margin-top: 130px;">
              <h5>@{{elemento.username}}</h5>
              <p>@{{elemento.email}}</p>
              @if($rol=='1')
               <div>
               <form action="{{action('UserController@listado')}}" method="get">
                  {{csrf_field()}}
                  <p class="mb-1 h5">Admin</p>
                  <button class="small text-black mb-0" style="background-color: rgb(173, 89, 80);">modulos</button>
               </form>
               </div>
              @endif
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: rgb(246, 243, 190);">
            <div class="d-flex justify-content-end text-center py-1">
              <div  v-for="elemento in coinses" >
                <p class="mb-1 h5">@{{elemento.coins}}</p>
                <p class="small text-muted mb-0">Coins</p>
              </div>
              <div v-for="elemento in friend" class="px-3">
                <p class="mb-1 h5">@{{elemento.amigos}}</p>
                <p class="small text-muted mb-0">Amigos</p>
              </div>
            </div>
          </div>
          <div>
               <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist" >
                <li  class="nav-item" role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="nav-link text-black " >Partidas   <span class="fas fa-th-list"></span></a></li>
                <li  class="nav-item" role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"  class="nav-link text-black">Mis amigos   <span class="fas fa-user"></span></a></li>
                <li  class="nav-item" role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" class="nav-link text-black">Mis skins   <span class="fas fa-heart"></span></a></li>
                <li  class="nav-item" role="presentation"><a href="#amistad" aria-controls="amistad" role="tab" data-toggle="tab" class="nav-link text-black">solicitudes   <span class="fas fa-thumbs-up"></span></a></li>
                <li  class="nav-item" role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" class="nav-link text-black ">Settings   <span class="fas fa-wrench"></span></a></li>
              </ul>
                <!-- Tab panes -->
              <div class="tab-content" >
              
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                    <div class="mb-5">
                       <p class="lead fw-normal mb-1">Partidas</p>
                          <div class="p-4" v-for="elemento in record" style="background-color: rgb(246, 243, 190);">
                            <p class="font-italic mb-1">En una partida el @{{elemento.fecha |formato_fecha}}</p>
                            <p class="font-italic mb-1">Corrió  @{{elemento.score}} metros </p>
                            <p class="font-italic mb-0">Recolecto @{{elemento.coins}} monedas</p>
                          </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="profile">
                     <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0 ">Amigos</p>
                     </div>
                     <ul class="list-group" v-for="elemento in amigos"  >
                        <li class="list-group-item list-group-item text-center " style="background-color: rgb(246, 243, 190);">
                        <img :src="'{{URL::to('/')}}/'+ elemento.amigofoto"
                              alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3"
                              style="width: 80px;">
                              <h5>@{{elemento.amigo}}</h5>
                              <p>@{{elemento.amigoemail}}</p>
                        </li>
                      </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="messages">
                     <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0 ">Mis Skins</p>
                     </div>
                      <div class="container px-4 px-lg-5 mt-5">
                         <div  class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                           <div   class="col mb-5" v-for="elemento in skins" >
                              <div class="card h-100" >
                                    <!-- Product image-->
                                <img class="card-img-top" :src="'{{URL::to('/')}}/'+ elemento.foto" width="450" alt="" />
                                      <!-- Product details-->
                                   <div class="card-body p-4">
                                      <div class="text-center">
                                          <!-- Product name-->
                                        <h5 class="fw-bolder">@{{elemento.skinname}}</h5>
                                          <!-- Product price-->
                                    
                                      </div>
                                   </div>
                               </div>
                             </div>
                          </div>
                       </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="settings">
                      <div class="card-body">
                              <div id="app" class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                      <form enctype="multipart/form-data" action="{{action('PerfilController@save')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="iduser" class="form-control" value="{{$usuario2->iduser}}">
                                        <input type="hidden" name="idrol" class="form-control" value="{{$usuario2->idrol}}">
                                        <div class="form-group">
                                        <label class="form-label" for="">Username
                                        </label>
                                        <input type="text" v-model="username" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label class="form-label" for="">Email/Correo
                                        </label>
                                        <input type="text" v-model="email" name="email" class="form-control">
                                        </div> 
                                      <div class="form-group">
                                        <label class="form-label" for="">Password/Contraseña
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
                                      </form>
                                 </div>
                            </div>
                      </div> 
                  </div>
                  <div role="tabpanel" class="tab-pane fade in active" id="amistad">
                     <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0 ">Solucitudes de amistad</p>
                              <table class="table table-bordered">
                                  <tr>
                                      <th>Solicitud</th>
                                      <th></th>
                                  </tr>
                                  <tr v-for="elemento in solicitudes">
                                      <td>@{{elemento.usuario}}</td>
                                      {{-- <td>@{{elemento.amigo}}</td> --}}
                                      <td>
                                          <form method="GET" action="{{action('PerfilController@aceptarsolicitud')}}">
                                              <input type="hidden" :value="elemento.iduser" name="usuario">
                                              <input type="hidden" :value="elemento.idamigo" name="amigo">
                                              <button name="status" value="1">Aceptar</button>
                                              <button name="status" value="3">Eliminar</button>
                                          </form>
                                      </td>
                                  </tr>
                              </table>
                     </div>
                  </div>
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
        record:<?php echo json_encode($record);?>
        ,usuario:<?php echo json_encode($usuario);?>
        ,coinses:<?php echo json_encode($coinses);?>
        ,friend:<?php echo json_encode($friend);?>
        ,skins:<?php echo json_encode($skins);?>
        ,amigos:<?php echo json_encode($amigos);?>
        ,solicitudes:<?php echo json_encode($solicitudes);?>
        ,username:'{{$usuario2->username}}'
        ,email:'{{$usuario2->email}}'
        ,password:'{{$usuario2->password}}'
        ,tipos_permitidos:['image/jpeg','image/png']
        ,bandera:0
        ,url:'{{URL::to("/")}}/'+'{{$usuario2->foto}}'
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
      ,filters:{
        
        formato_fecha:function(fecha){
				datos=fecha.split('-');
				anio=datos[0];
				mes=datos[1];
				dia=datos[2];
				switch(mes)
				{
					case'01':
						mes = 'Enero';
					break;

					case '02':
						mes = 'Febrero';
					break;

					case '03':
						mes = 'Marzo';
					break;

					case '04':
						mes = 'Abril';
					break;

					case '05':
						mes = 'Mayo';
					break;

					case '06':
						mes = 'Junio';
					break;

					case '07':
						mes = 'Julio';
					break;

					case '08':
						mes = 'Agosto';
					break;

					case '09':
						mes = 'Septiembre';
					break;

					case '10':
						mes = 'Octubre';
					break;

					case '11':
						mes = 'Noviembre';
					break;

					case '12':
						mes = 'Diciembre';
					break;
				}

				cadena_fecha = dia + ' de ' +mes + ' de ' + anio;
				return cadena_fecha;
			}
      }
       });
       
  </script>
@endsection


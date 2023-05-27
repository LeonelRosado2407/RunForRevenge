<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrate en RUN FOR REVENGE </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/app/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/app/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/app/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
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
<body class="hold-transition register-page bg-image" style="height: 600px;background-image: url('{{ asset('public/Homeresources/fo3.png') }}');background-position: center;background-size: contain;">
<div id="app" class="register-box" >
  <div class="register-logo">
    <img class="card-img-top" src="{{asset('public/Homeresources/logo.png')}}"  alt="Card image cap">
  </div>

  <div class="card border border-success " id="app"> 
    <div class="card-body register-card-body" style="background-color: rgb(246, 243, 190);">
      <p class="login-box-msg">Registrate</p>
      <form action="{{action('Auth\RegisterController@register')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="esuser" value="3">
        <input type="hidden" name="foto" value="">
        <div class="input-group mb-3 border border-success rounded"  >
          <input type="text" name="username" class="form-control " placeholder="Username" style="background-color: rgb(246, 243, 190);">
          <div class="input-group-append"  >
            <div class="input-group-text" >
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 border border-success rounded">
          <input type="email" name="email" class="form-control" placeholder="Email" style="background-color: rgb(246, 243, 190);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 border border-success rounded">
          <input type="password" name="password" class="form-control" placeholder="Password" style="background-color: rgb(246, 243, 190);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block" style="background-color: rgb(173, 89, 80);">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="http://localhost/run-for-revenge/" class="text-success">Ya tengo cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('public/app/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/app/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/app/adminlte.min.js')}}"></script>
<script src="{{asset('public/app/demo.js')}}"></script>
<script src="{{asset('public/vue.js')}}"></script>
<script>
    new Vue({
      el: '#app',
      data:{
        tipos_permitidos:['image/jpeg','image/png']
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
        }
      }
       });
  </script>
</body>

</html>

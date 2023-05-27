<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/app/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/app/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link href="{{asset('public/Homeresources/styles.css')}}" rel="stylesheet" />
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/app/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-image" style="height: 600px;background-image: url('{{ asset('public/Homeresources/fo3.png') }}');background-position: center;background-size: contain;"  >
<div class="login-box"> 
  <div class="login-logo">
    <img class="card-img-top" src="{{asset('public/Homeresources/logo.png')}}"  alt="Card image cap">
  </div>
  <!-- /.login-logo -->
  <div class="card border border-success"  >
    <div class="card-body login-card-body " style="background-color: rgb(246, 243, 190);"  >
      <p class="login-box-msg">Iniciar sesión</p>
      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
      </div>
      @endif
      <form action="{{action('Auth\LoginController@login')}}" method="post">
        {{csrf_field()}}
        <div class="input-group mb-3 border border-success rounded" >
          <input type="email" class="form-control " name="email" placeholder="Email" style="background-color: rgb(246, 243, 190);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 border border-success rounded" >
          <input type="text" class="form-control" name="password" placeholder="Password" style="background-color: rgb(246, 243, 190);">
          <div class="input-group-append" >
            <div class="input-group-text" >
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row"  >
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block" style="background-color: rgb(173, 89, 80);">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="http://localhost/run-for-revenge/registrate" class="text-success ">No tengo cuenta</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="{{asset('public/Homeresources/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
<script src="{{asset('public/Homeresources/scripts.js')}}"></script>

<script src="{{asset('public/Homeresources/sb-forms-0.4.1.js')}}"></script>
</body>
</html>

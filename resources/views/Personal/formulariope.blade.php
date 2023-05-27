<!DOCTYPE html>
<!-- saved from url=(0099)http://cursos.utmetropolitana.edu.mx/moodle/pluginfile.php/20750/mod_label/intro/pagina_basica.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">  
    <title>Pagina de prueba del bootstrap</title>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->   
    
     
    <link rel="stylesheet" href="{{asset('public/bootstrap.css')}}">     
  </head>  
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Bienvenido a Registro de Personal </h1>
        <form action="{{action('PersonalController@insertarpe')}}" method="POST">
          {{csrf_field()}}
        <div>
          <label class="form-label" form="">Nombre del Personal
          </label>
          <input type="text" name="nombrepe" class="form-control" value="">
        </div>
        <div>
          <label class="form-label" form="">CURP
          </label>
          <input type="text" name="curp" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-success">Registrar</button> 
        </form>
      </div>
    </div>
  </div>
  <div class="container"></div>
  <script src="{{asset('public/jquery.min.js')}}"></script>
  <script src="{{asset('public/bootstrap.min.jss')}}"></script>
</body></html>
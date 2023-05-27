@extends('app.master')

@section('titulo')
Amigos de {{$user->username}}
@endsection

@section('contenido')
      <!-- Default box -->
      <div class="card" style="background-color: rgb(246, 243, 190);">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
      <div class="col-md-12">
      <form action="{{action('UserController@listado')}}" method="get">
          {{csrf_field()}}
          <button class="btn btn-warning">Regresar</button>  
      </div>
    </div>
    <div id="app" class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h1>Amigos</h1>
        <table class="table table-striped">
          <tr>
            <th>Amigo</th>
          </tr>
          <tr v-for="elemento in lista"> 
            <td>@{{elemento.amigo}}</td>
          </tr>
        </table>
      </div> 
    </div>
      <!-- /.card -->
@endsection

@section('script')
  <script>
    new Vue({
      el: '#app',
      data:{
        lista:<?php echo json_encode($lista);?>

      }
      ,methods:{}
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
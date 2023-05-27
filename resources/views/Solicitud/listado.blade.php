@extends('app.master')

@section('titulo')
 Mis solicitudes
@endsection

@section('contenido')

<div id="app" class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th>Solicitud</th>
                <th></th>
            </tr>
            <tr v-for="elemento in solicitudes">
                <td>@{{elemento.usuario}}</td>
                {{-- <td>@{{elemento.amigo}}</td> --}}
                <td>
                    <form method="GET" action="{{action('SolicitudController@aceptarsolicitud')}}">
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
@endsection

@section('script')
<script>
    new Vue({
        el:'#app'
        ,data:{
            solicitudes:<?php echo json_encode($solicitudes);?>
        }
        ,methods:{}
    })
</script>
@endsection
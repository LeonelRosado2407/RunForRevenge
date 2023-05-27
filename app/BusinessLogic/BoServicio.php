<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\TipoServicio;
use App\Model\Servicio;
use App\Model\Horario;

class BoServicio{

	function valida_horario($objeto){
        $bandera=true;
		$servicios=Servicio::where('idestacion',$objeto->idestacion)
              ->whereRaw("fecha_atencion_inicial<'".$objeto->fa_final."' and fecha_atencion_final>'".$objeto->fa_inicial."'")
              ->get();
           if(count($servicios)!=0){
           	  $bandera=false;
           }

           return $bandera;
	}

   //Este metodo sirve para registrar un servicio
	//La informacion de entrada es:
	/*
	Fecha de servicio
	Estacion
	Horario
	Datos Del Carro
	Socio
	TipoServicio
	Personal
	*/
	
	function registrar_servicio($objeto){
		$resultado=new \StdClass();

		if (!isset($objeto->fecha_registro)) {
			$objeto->fecha_registro=date('Y-m-d H:i:s');
		}

		if (!isset($objeto->origen)) {
			$objeto->origen='LOCAL';
		}

		if (!isset($objeto->precio)) {
			$tipo=TipoServicio::find($objeto->idtiposervicio);
			$objeto->precio=$tipo->precio;
		}

		if (!isset($objeto->fa_inicial)) {
			$horario=Horario::find($objeto->idhorario);
			$objeto->fa_inicial=$objeto->fecha_servicio.' '.$horario->hora_inicial;
			$objeto->fa_final=$objeto->fecha_servicio.' '.$horario->hora_final;
		}


        $bandera=$this->valida_horario($objeto);


        if ($bandera) {
        	$resultado->status='OK';
        	$resultado->mensaje='';
        	$servicio=new Servicio();
        	$servicio->placa=$objeto->placa;
        	$servicio->modelo=$objeto->modelo;
        	$servicio->anio=$objeto->anio;
        	$servicio->precio=$objeto->precio;
        	$servicio->idtiposervicio=$objeto->idtiposervicio;
        	$servicio->idpersonal=$objeto->idpersonal;
        	$servicio->idsocio=$objeto->idsocio;
        	$servicio->fecha_creacion=$objeto->fecha_registro;
        	$servicio->fecha_atencion_inicial=$objeto->fa_inicial;
        	$servicio->fecha_atencion_final=$objeto->fa_final;
        	$servicio->idestacion=$objeto->idestacion;
        	$servicio->idhorario=$objeto->idhorario;
        	$servicio->origen=$objeto->origen;
        	$servicio->save();
        	$resultado->servicio=$servicio;

        }
        else{
        	$resultado->status='Error';
        	$resultado->mensaje='La estacion no esta disponible para la fecha y el horario seleccionado';
        }



		return $resultado;
	}
}
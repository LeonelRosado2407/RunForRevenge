<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Status;

class StatusController extends Controller{

	public function listado()
	{
		$statutes=Status::all();
		$datos=array();
		$datos['lista']=$statutes;
		return view('Status.listado')->with($datos);
		//dd($servicios);

	}


    public function formulario(Request $r)
	{
		//recibir lo que los usuarios envian
		$datos=$r->all();
		 
		if($r->isMethod('post'))
		{
			//post significa que vamos a agregar
			//dd('vamos a agregar');
			$operacion='Agregar';
			$status= new Status();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$status=Status::find($datos['idstatus']);
		}
		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['status']=$status;

		return view('Status.formulario')->with($informacion);
	}

	public function save(Request $r)
	{
		//recibir datos que el usuario nos envio
		$datos=$r->all();
		//dd($datos);
		switch ($datos['operacion'])
		{
			case 'Agregar':
			    $datos=$r->all();
		        $status=new Status();
		        $status->nombre=$datos['nombre'];
		        $status->save();	
		    break;
		    case 'Editar':
				$status=Status::find($datos['idstatus']);
				$status->nombre=$datos['nombre'];
		        $status->save();
		    break;
		    case 'Eliminar':
				$status=Status::find($datos['idstatus']);
				$status->delete();
		    break;
			
		}
		//comentar la redirecion al listado hasta que todo me quede bien mi crud

		return $this->listado();


	}


}
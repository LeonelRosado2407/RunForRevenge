<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Tipopago;

class TipopagoController extends Controller{

	public function listado()
	{
		$tipopagos=Tipopago::all();
		$datos=array();
		$datos['lista']=$tipopagos;
		return view('Tipopago.listado')->with($datos);
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
			$tipopago= new Tipopago();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$tipopago=Tipopago::find($datos['idtipopago']);
		}
		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['tipopago']=$tipopago;

		return view('Tipopago.formulario')->with($informacion);
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
		        $tipopago=new Tipopago();
		        $tipopago->nombrep=$datos['nombrep'];
		        $tipopago->save();	
		    break;
		    case 'Editar':
				$tipopago=Tipopago::find($datos['idtipopago']);
				$tipopago->nombrep=$datos['nombrep'];
		        $tipopago->save();
		    break;
		    case 'Eliminar':
				$tipopago=Tipopago::find($datos['idtipopago']);
				$tipopago->delete();
		    break;
			
		}
		//comentar la redirecion al listado hasta que todo me quede bien mi crud

		return $this->listado();

	}


}

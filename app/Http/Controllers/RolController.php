<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Rol;

class RolController extends Controller{

	public function listado()
	{
		$roles=Rol::all();
		$datos=array();
		$datos['lista']=$roles;
		return view('Rol.listado')->with($datos);
		

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
			$rol= new Rol();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$rol=Rol::find($datos['idrol']);
		}
		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['rol']=$rol;

		return view('Rol.formulario')->with($informacion);
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
		        $rol=new Rol();
		        $rol->nombre=$datos['nombre'];
		        $rol->save();	
		    break;
		    case 'Editar':
				$rol=Rol::find($datos['idrol']);
		        $rol->nombre=$datos['nombre'];
		        $rol->save();
		    break;
		    case 'Eliminar':
				$rol=Rol::find($datos['idrol']);
				$rol->delete();
		    break;
			
		}
		//comentar la redirecion al listado hasta que todo me quede bien mi crud

		return $this->listado();

	}


}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Permiso;
use App\Model\Rol;

class PermisoController extends Controller{

	public function listado()
	{
		$permisos=Permiso::all();
		$datos=array();
		$datos['lista']=$permisos;
		return view('Permiso.listado')->with($datos);
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
			$permiso= new Permiso();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$permiso=Permiso::find($datos['idpermiso']);
		}
		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['permiso']=$permiso;

		return view('Permiso.formulario')->with($informacion);
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
		        $permiso=new Permiso();
		        $permiso->nompermiso=$datos['nompermiso'];
		        $permiso->clave=$datos['clave'];
		        $permiso->save();	
		    break;
		    case 'Editar':
				$permiso=Permiso::find($datos['idpermiso']);
		        $permiso->nompermiso=$datos['nompermiso'];
		        $permiso->clave=$datos['clave'];
		        $permiso->save();
		    break;
		    case 'Eliminar':
				$permiso=Permiso::find($datos['idpermiso']);
				$permiso->delete();
		    break;
			
		}
		//comentar la redirecion al listado hasta que todo me quede bien mi crud

		return $this->listado();

	}


}
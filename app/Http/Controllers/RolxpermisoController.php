<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Rolxpermiso;
use App\Model\Rol;    
use App\Model\Permiso;  

class RolxpermisoController extends Controller{

	function formulario(Request $r){
		$datos=$r->all();
		$info=array();
		$permisos=Permiso::all();
		$asignadas=Rolxpermiso::where('idrol',$datos['idrol'])->get();
		$roles=Rol::find($datos['idrol']);

//ciclos
		for ($i=0;$i<count($permisos);$i++)
		{ 
			$bandera=false;
			foreach($asignadas as $elemento)
			{
				if($elemento->idpermiso==$permisos[$i]->idpermiso)
				{
					$bandera=true;
				}

			}

			$permisos[$i]->asignada=$bandera;
		}



		$info['permisos']=$permisos;
		$info['roles']=$roles;

		return view('Rolxpermiso.formulario')->with($info);
		//dd($datos);
	}

	function save(Request $r){
		$datos=$r->all();
		//1. borrar todas los tipos de reporte del tipo de animal selecionado
		Rolxpermiso::where('idrol',$datos['idrol'])->delete();

		//cuando no se leciono el tipo de de reporte no existe[idtiporeporte] 
		//lo que hay que hacer es valir
		if(isset($datos['idpermiso']))
		{
			//2. Insertar todos los tipos de reporte de la peticion
		foreach($datos['idpermiso'] as $permiso)
		{
			$taxr=new Rolxpermiso();
			$taxr->idpermiso=$permiso;
			$taxr->idrol=$datos['idrol'];
			$taxr->save();
		}

		}


		return $this->formulario($r);

	}


}

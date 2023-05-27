<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Skins;
use App\Model\Categoria;

class SkinsController extends Controller{

	public function listado()
	{
		//$personales=Personal::all();
		//se modifico la consulta de listado para que sea de tipo join
		$skinses=Skins::join('categoria','categoria.idcategoria','=','skins.idcategoria')
		
		->select(
             "skins.idskins"
			,"skins.skinname"
			,"skins.price"
			,"skins.descrip"
			,"skins.foto"
			,"categoria.idcategoria"
			,"categoria.nombre_categoria"
		)
		->get();
		$datos=array();
		$datos['lista']=$skinses;
		return view('skins.listado')->with($datos);
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
			$skins= new Skins();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$skins=Skins::find($datos['idskins']);
		}
		//recuperar todo los registros de la tabla de sedes
		$categoria=categoria::all();



		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['skins']=$skins;
		$informacion['categoria']=$categoria;

		return view('skins.formulario')->with($informacion);
	}

	public function save(Request $r)
	{
		//recibir datos que el usuario nos envio
		$datos=$r->all();
		//dd($datos);
		switch ($datos['operacion'])
		{
			case 'Agregar':
			    if($r->hasFile('foto'))
			    {
			    	$archivo=$r->file('foto');
			    	//time() nos genera un timestamp y  getClientOriginalExtension nos obtiene la extencion del archivo
			    	$nombre='foto-'.time().'.'.$archivo->getClientOriginalExtension();
			    	//storeAs es una funcion del laravel que sustituye al move_upladefile
			    	//aqui es donde se define el archivo nuevo
			    	$nombre_archivo=$archivo->storeAs('fotos',$nombre);
			    }
			    else
			    {
			    	$nombre_archivo='';

			    }
		        $skins=new Skins();
		        $skins->skinname=$datos['skinname'];
		        $skins->price=$datos['price'];
				$skins->descrip=$datos['descrip'];
		        $skins->foto=$nombre_archivo;
		        $skins->idcategoria=$datos['idcategoria'];
		        $skins->save();	
		    break;
		    case 'Editar':
		        if($r->hasFile('foto'))
			    {
			    	$archivo=$r->file('foto');
			    	//time() nos genera un timestamp y  getClientOriginalExtension nos obtiene la extencion del archivo
			    	$nombre='foto-'.time().'.'.$archivo->getClientOriginalExtension();
			    	//storeAs es una funcion del laravel que sustituye al move_upladefile
			    	//aqui es donde se define el archivo nuevo
			    	$nombre_archivo=$archivo->storeAs('fotos',$nombre);
			    }
			    else
			    {
			    	$nombre_archivo='';

			    }
				$skins=Skins::find($datos['idskins']);
				//donde estamos con el viejo
				//borra el archivo viejo
				if($nombre_archivo!='')
				{
					Storage::delete($skins->foto);
				}
		        $skins->skinname=$datos['skinname'];
		        $skins->price=$datos['price'];
				$skins->descrip=$datos['descrip'];
		        if($nombre_archivo!='')
		        $skins->foto=$nombre_archivo;
		        $skins->idcategoria=$datos['idcategoria'];
		        $skins->save();
		    break;
		    case 'Eliminar':
				$skins=Skins::find($datos['idskins']);
				$skins->delete();
				Storage::delete($skins->foto);
		    break;
			
		}
		//comentar la redirecion al listado hasta que todo me quede bien mi crud

		return $this->listado();		

	}


	public function mostrar_foto($nombre_foto)
	{
		$path = storage_path('app/fotos/'.$nombre_foto);

		if (!File::exists($path))
		{
			abort(404);
		}

		$file = File::get($path);
		$type = File::mimeType($path);
		$response = Response::make($file,200);
		$response->header("Content-Type",$type);
		return $response;
	}




}


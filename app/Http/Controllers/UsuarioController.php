<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Record;
use App\Model\Coins;
use App\Model\Rol;

class UsuarioController extends Controller{

	public function listado()
	{
		//$personales=Personal::all();
		//se modifico la consulta de listado para que sea de tipo join
		$usuarios=User::join('rol','rol.idrol','=','user.idrol')
		
		->select(
             "user.iduser"
			,"user.username"
			,"user.email"
			,"user.password"
			,"user.foto"
			,"rol.idrol"
			,"rol.nombre"
		)
		->get();
		$datos=array();
		$datos['lista']=$usuarios;
		return view('Usuario.listado')->with($datos);
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
			$usuario= new User();


		}
		else
		{
			//get fue por enlace y significa que vamos a actualizar
			//dd('vamos a editar');
			$operacion='Editar';
			$usuario=User::find($datos['iduser']);
		}

		$rol=Rol::all();



		//para enviar informacion a la lista
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['user']=$usuario;
		$informacion['rol']=$rol;

		return view('Usuario.formulario')->with($informacion);
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
			    
		        $usuario=new User();
				$usuario->username=$datos['username'];
		        $usuario->email=$datos['email'];
		        $usuario->password=bcrypt($datos['password']);
		        $usuario->foto=$nombre_archivo;
		        $usuario->idrol=$datos['idrol'];
		        $usuario->save();	
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
				$usuario=User::find($datos['iduser']);
				//donde estamos con el viejo
				//borra el archivo viejo
				if($nombre_archivo!='')
				{
					Storage::delete($usuario->foto);
				}
		        $usuario->username=$datos['username'];
		        $usuario->email=$datos['email'];
				if($datos['password']==$usuario['password'])
				{
					$usuario->password=$datos['password'];
				}
				else
				{
				 $usuario->password=bcrypt($datos['password']); 
				}
		        
		        if($nombre_archivo!='')
		        $usuario->foto=$nombre_archivo;
		        $usuario->idrol=$datos['idrol'];
		        $usuario->save();
		    break;
		    case 'Eliminar':
				$usuario=User::find($datos['iduser']);
				$usuario->delete();
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
		//dd($response);
		return $response;
	}

}


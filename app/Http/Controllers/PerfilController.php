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
use App\Model\Partida;
use App\Model\Monedero;
use App\Model\Friends;
use App\Model\Wardrobe;
use App\Model\Usuario;
use App\Model\Solicitud;
use Illuminate\Validation\Rules\Exists;

use App\BusinessLogic\BOSolicitud;


class PerfilController extends Controller{

	public function perfil()
	{
        $user=auth()->user();
        $usuario=User::where('iduser',$user['iduser'])->get();

		//dd($usuario);


        $records=Partida::select(
			"idpartida"
			,"iduser"
			,"score"
			,"fecha_partida"
			,DB::raw("DATE_FORMAT(fecha_partida,'%Y-%m-%d') as fecha")
			,"coins"
		)
		->where('iduser',$user['iduser'])
		->get();

		$friend=DB::select("select
			COUNT(*) as amigos
			,u1.username as user
			,u2.username as amigo
			from user as u1
			join friends on friends.iduser=u1.iduser
			join user as u2 on friends.friend = u2.iduser
			where u1.iduser = ". $user['iduser'] 
		);

        $coinses=Monedero::where('iduser',$user['iduser'])
        ->select(
			"iduser"
			,"coins"
		) 
        ->get();

		$skins=Wardrobe::join('skins','skins.idskins','=','wardrobe.idskins')
        ->select(

             "skins.idskins"
            ,"skins.skinname"
			,"skins.foto"
            ,"wardrobe.iduser"
            ,"wardrobe.idskins"
        )
		->where('wardrobe.iduser','=',$user['iduser'])
        ->get();

		$amigos=DB::select(
            "select 
            u1.username as user,
            u2.username as amigo, 
			u2.foto as amigofoto,
			u2.email as amigoemail
            from user as u1
            join friends on friends.iduser=u1.iduser
            join user as u2 on friends.friend = u2.iduser
            where friends.iduser=".$user['iduser']
        );
		//dd($amigos);


		$solicitudes=DB::select(
            "select
            u1.iduser 
            ,u2.iduser as idamigo
            ,u1.username as usuario
            ,u2.username as amigo
            ,solicitud.status
            from user as u1
            join solicitud on solicitud.iduser = u1.iduser
            join user as u2 on u2.iduser = solicitud.idfriend
            where u2.iduser = ".$user['iduser']." and solicitud.status = 0" 
        );
        // dd($solicitudes);
        
		
		$operacion='Editar';
		$usuario2=User::find($user['iduser']);
		$rol=$usuario2['idrol'];

		$datos=array();
		$datos['record']=$records;
        $datos['usuario']=$usuario;
        $datos['coinses']=$coinses;
        $datos['friend']=$friend;
		$datos['amigos']=$amigos;
		$datos['skins']=$skins;
		$datos['operacion']=$operacion;
		$datos['usuario2']=$usuario2;
		$datos['rol']=$rol;	
		$datos['solicitudes']=$solicitudes;
		//dd($rol1);

		return view('auth.profile')->with($datos); 
             


	}

	public function aceptarsolicitud(Request $r){
		
		$datos = $r->all();
		$bo=new BoSolicitud();
		$objeto=new \Stdclass();
		$objeto->usuario=$datos['usuario'];
		$objeto->amigo=$datos['amigo'];
		$objeto->status=$datos['status'];
		//dd($objeto);
		//$estado=$bo->get($objeto);
		$respuesta = $bo->solicitud($objeto);
		//return $this->perfil();
        //return view('auth.profile');
		return redirect()->action('PerfilController@perfil');
        
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


	public function editperfil()
	{
		$user=auth()->user();
		$operacion='Editar';
		$usuario=User::find($user['iduser']);
		
		$informacion=array();
		$informacion['operacion']=$operacion;
		$informacion['usuario']=$usuario;	
			
		return view('auth.editprofile')->with($informacion);
		

		
	}

	public function save(Request $r)
	{
		$datos=$r->all();
		$user=auth()->user();
		//dd($user);

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
			    	$nombre_archivo='fotos/foto-1679412589.png';

			    }
				$usuario=User::find($datos['iduser']);
				//donde estamos con el viejo
				//borra el archivo viejo
		        $usuario->username=$datos['username'];
		        $usuario->email=$datos['email'];
				if($datos['password']==$user['password'])
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


				return $this->perfil();






	}

	public function listado(){
        $perfil = new PerfilController();
        $user=auth()->user();
        //dd($user);
        // $solicitudes=Solicitud::all();
        $solicitudes=DB::select(
            "select
            u1.iduser
            ,u2.iduser as idamigo
            ,u1.username as usuario
            ,u2.username as amigo
            ,solicitud.status
            from user as u1
            join solicitud on solicitud.iduser = u1.iduser
            join user as u2 on u2.iduser = solicitud.idfriend
            where u2.iduser = ".$user['iduser']." and solicitud.status = 0" 
        );
        // dd($solicitudes);
        $datos = array();
        $datos['solicitudes']=$solicitudes;
        return view('auth.profile')->with($datos);
    }

        


	





}


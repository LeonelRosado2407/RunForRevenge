<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Record;
use App\Model\User;
use App\Model\Monedero;
use App\Model\Partida;
use App\Model\Compra;
use App\Model\Detalle_compra;

use App\BusinessLogic\BoEstado;
use App\BusinessLogic\BoPartida;
use App\BusinessLogic\BoMonedero;
use App\BusinessLogic\BoRecords;








class ApiController extends Controller{
	
	
	//record funciona
	
	function record(Request $r)
	{
		
		$consulta=Record::join('user','record.iduser','=','user.iduser')
		->select
		(
			'record.score'
			,DB::Raw("user.username as user")
		)
		->get();
		$records=array();
		foreach($consulta as $row)
		{
			$records[]=$row;
		}
		
		echo ('{"record":'.json_encode($records).'}');

		//'{"record":'.json_encode($records).'}'
	}
	/*
			    $usuario=new User();
				$usuario->username=$datos['username'];
		        $usuario->email=$datos['email'];
		        $usuario->password=bcrypt($datos['password']);
		        //dd($usuario);
		        $usuario->idrol=$datos['idrol'];
		        $usuario->save();

	*/

	//registra funciona
	function recibir(Request $r)
	{
		$context=$r->all();
		$usuario=new User();
		$usuario->username=$context['username'];
		$usuario->email=$context['email'];
		$usuario->password=bcrypt($context['password']);
		$usuario->idrol="3";
		$usuario->save();
		return "102";	
		
	}

	function login(Request $r)
	{		//no funciona......
		//use AuthenticatesUsers;
		$context=$r->all();
		//dd($context);

	    
		
		
		
		/*$usuario=DB::table('user')
		->select('iduser','username','email','password','idrol')
		->whereRaw(" username ='".$context['username']."' and password ='".bcrypt($context['password'])."'")
		->get();
		dd($context['username']);
		$prueba=bcrypt($context['password']);
		$prueba2=bcrypt("123456");
		$prueba3=bcrypt("123456");

		dd($prueba.'debe ser igual'.$prueba2.$prueba3);
		*/

		//dd($usuario.bcrypt($context['password']));
		//$usuario=DB::select(
			
		//);
		//dd($usuario);
		//$resultado =new \StdClass();

		/*if(isset($usuario))
		{
			//$resultado->usuario=$
			//$resultado=$usuario;
			dd("login bueno".$usuario);

		}
		else
		{
			dd("login malo".$usuario);


		}
		*/
		





	}

	function prueba(Request $r)
	{
		$context=$r->all();
		//echo (json_encode($context));
		//return response()->json($context);
		return "102";	

		//HTTP/1.1 200 OK
		// Date: Fri, 10 Feb 2023 15:38:25 GMT
		// Server: Apache/2.4.51 (Win64) PHP/7.4.26
		// X-Powered-By: PHP/7.4.26
		// Cache-Control: no-cache, private
		// X-RateLimit-Limit: 60
		// X-RateLimit-Remaining: 59
		// Content-Length: 2
		// Content-Type: application/json



	}

	function recordg(Request $r)
	{
		//tomamos todos los valores
		$record_global=Record::join('user','user.iduser','=','record.iduser')
		->select(
			"user.username"
			,"record.score"
		)
 
		//ordenamos por orden descendente
		->orderBy('score','desc')
		//limitamos a 5
		 ->skip(0)->take(10)
		//obtenemos datos
		->get();
	   
		$records=array();
		foreach($record_global as $row)
		{
			$records[]=$row;
		}
		
		echo ('{"record":'.json_encode($records).'}');
 
		//dd($datos);
 

	}

	function record_amigos(Request $r)
	{
		$context=$r->all();
		$bo=new BoRecords();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		$estado=$bo->get_amigos($objeto);
		//return response()->json($context);

	}

	function recordm(Request $r)
	{
		$context=$r->all();
		$bo=new BoRecords();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		$estado=$bo->get_mi($objeto);
		//return response()->json($context);

	}




	function partida(Request $r )
	{
		$context=$r->all();
		$bopartida=new BoPartida();
		$bomonedero=new BoMonedero();
		$borecord=new BoRecords();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		$objeto->score=$context['score'];
		$objeto->coins=$context['coins'];
		$bopartida->save($objeto);
		$bomonedero->save($objeto);
		$borecord->save($objeto);
	}

/*
	function (Request $r)
	{
		$context=$r->all();

		$record_friend= \DB::select('select 
		u1.iduser
		,u1.username as user
		,u2.iduser as idamigo
		,u2.username as amigo
		,record.score as recordamigo
		from user as u1
		join friends on friends.iduser=u1.iduser
		join user as u2 on friends.friend = u2.iduser
		join record on record.iduser = u2.iduser
		where u1.iduser ='.$context['iduser'].'
		order by record.score desc' );

		$records=array();
		foreach($record_friend as $row)
		{
			$records[]=$row;
		}
		
		echo ('{"record":'.json_encode($records).'}');

	}



*/


function save_estado(Request $r)
	{

		$context=$r->all();
		$bo=new BoEstado();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		$objeto->vida =$context['vida'];
		$objeto->coins =$context['coins'];
		$objeto->score =$context['score'];
		$objeto->plataformas =$context['plataformas'];
		$objeto->Jugador =$context['Jugador'];
		$objeto->plataformaposition =$context['plataformaposition'];
		$bo->save($objeto);

	}

	function delete_estado(Request $r)
	{	

		$context=$r->all();
		$bo=new BoEstado();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		$bo->eliminar($objeto);

	}

	function get_estado(Request $r)
	{

		$context=$r->all();
		$bo=new BoEstado();
		$objeto=new \Stdclass();
		$objeto->iduser=$context['iduser'];
		//$estado = array();
		$estado['estado']=$bo->get($objeto);
		//return $estado;
		echo (json_encode($estado));
 
		//return response()->json($estado);
	

	}

	function get_monedas(Request $r)
	{
		$context = $r->all();
		$bo = new BoMonedero();
		$objeto  = new \Stdclass();
		$objeto->iduser = $context['iduser'];
		$Monedas = $bo->get($objeto);
		echo($Monedas->coins);

	}









}

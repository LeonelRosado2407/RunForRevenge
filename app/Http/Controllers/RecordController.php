<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Partida;
use App\Model\User;

class RecordController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$coinses=Partida::where('iduser',$context['iduser'])->get();
		$user=User::find($context['iduser']);
		$datos=array();
		$datos['lista']=$coinses;
		$datos['user']=$user;
		return view('Record.listado')->with($datos);

	}



}
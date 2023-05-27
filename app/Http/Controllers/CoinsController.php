<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Monedero;
use App\Model\User;

class CoinsController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$coinses=Monedero::where('iduser',$context['iduser'])->get();
		$user=User::find($context['iduser']);
		$datos=array();
		$datos['lista']=$coinses;
		$datos['user']=$user;
		return view('Coins.listado')->with($datos);

	}
}
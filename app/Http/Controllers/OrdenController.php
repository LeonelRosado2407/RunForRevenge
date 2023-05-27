<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Compra;
use App\Model\Status;
use App\Model\Tipopago;
use App\Model\User;

class OrdenController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$ordenes=Compra::join('status','status.idstatus','=','compra.idstatus')
        ->join('user','user.iduser','=','compra.iduser')
        ->join('skins','skins.idskins','=','compra.idskins')
        ->select(

             "status.idstatus"
            ,"status.nombre"
            ,"user.iduser"
            ,"user.username"
            ,"compra.fecha"
            ,"compra.idcompra"
            ,"compra.idcompra"
            ,"skins.skinname"
            ,"skins.price"
        )
        ->where('user.iduser','=',$context['iduser'])
        ->get();
        $user=User::find($context['iduser']);
		$datos=array();
		$datos['lista']=$ordenes;
		$datos['user']=$user;
		return view('Orden.listado')->with($datos);

	}



}
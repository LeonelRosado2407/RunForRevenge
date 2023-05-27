<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Orden;
use App\Model\Skins;
use App\Model\Tipopago;
use App\Model\User;
use App\Model\Detalle_orden;

class Detalle_ordenController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$detalles=Detalle_orden::join('skins','skins.idskins','=','detalle_orden.idskins')
        ->join('orden','orden.idorden','=','detalle_orden.idorden')
        ->select(

             "skins.idskins"
            ,"skins.skinname"
            ,"detalle_orden.precio"
            ,"detalle_orden.cantidad"
            ,"orden.idorden"
        )
        ->where('orden.idorden','=',$context['idorden'])
        ->get();
        $orden=Orden::find($context['idorden']);
		$datos=array();
		$datos['lista']=$detalles;
		$datos['orden']=$orden;
		return view('Detalle_orden.listado')->with($datos);

	}








}
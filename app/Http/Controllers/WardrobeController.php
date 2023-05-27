<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Skins;
use App\Model\Wardrobe;
use App\Model\User;

class WardrobeController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$coinses=Wardrobe::join('skins','skins.idskins','=','wardrobe.idskins')
        ->join('user','user.iduser','=','wardrobe.iduser')
        ->select(

             "skins.idskins"
            ,"skins.skinname"
            ,"user.iduser"
            ,"user.username"
        )
        ->where('user.iduser','=',$context['iduser'])
        ->get();
        $user=User::find($context['iduser']);
		$datos=array();
		$datos['lista']=$coinses;
		$datos['user']=$user;
		return view('Wardrobe.listado')->with($datos);

	}
}
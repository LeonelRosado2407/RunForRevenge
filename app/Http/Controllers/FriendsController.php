<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;

class FriendsController extends Controller{

	public function listado(Request $r)
	{
		$context=$r->all();
		$amigos=DB::select(
            "select 
            u1.username as user,
            u2.username as amigo 
            from user as u1
            join friends on friends.iduser=u1.iduser
            join user as u2 on friends.friend = u2.iduser
            where friends.iduser=".$context['iduser']
        );
        $user=User::find($context['iduser']);
		$datos=array();
		$datos['lista']=$amigos;
		$datos['user']=$user;

		return view('Friends.listado')->with($datos);

	}
}
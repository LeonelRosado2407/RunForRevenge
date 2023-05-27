<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Partida;
use App\Model\Coins;
use App\Model\Record;

class HomeController extends BaseController
{
    public function Bienvenida(){
        return View('Home.Home2');
        // return View('Home.home');

    }


    public function Top_Global(){

        $user=auth()->user();
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
       where u1.iduser ='.$user['iduser'].'
       order by record.score desc' )
       ;
      
       $datos = array();
       $datos['record_g'] = $record_global;
       $datos['record_f'] = $record_friend;
       //$datos['numeros'] = $numeros;
      
       

       // dd($datos);

       return View('Home.home')->with($datos);

    }


}


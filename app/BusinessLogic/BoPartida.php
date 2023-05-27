<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Partida;


class BoPartida
{
    function save($objeto)
    {
        date_default_timezone_set("America/Merida");
        $partida=Partida::where('iduser',$objeto->iduser)->first();
        $partida=new Partida();
        $partida->iduser=$objeto->iduser;
        $partida->score=$objeto->score;
		$partida->coins=$objeto->coins;
		$partida->fecha_partida=date('Y-m-d H:i:s');
        $partida->save();

    }


    


}
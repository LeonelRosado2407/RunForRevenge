<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Estado;

class BoEstado
{
    function save($objeto)
    {
        $estado=Estado::where('iduser',$objeto->iduser)->first();
        if(!$estado)
        {
            //no existe
            $estado=new Estado();

        }
        $estado->iduser=$objeto->iduser;
        $json =array();
        $json['vida']=$objeto->vida;
		$json['coins']=$objeto->coins;
		$json['score']=$objeto->score;
		$json['plataformas']=$objeto->plataformas;
		$json['Jugador']=$objeto->Jugador;
		$json['plataformaposition']=$objeto->plataformaposition;
        $estado->json=json_encode($json);
        $estado->save();

    }

    function eliminar($objeto)
    {
        $estado=Estado::where('iduser',$objeto->iduser)->delete();


    }

    function get($objeto)
    {
        $estado=Estado::where('iduser',$objeto->iduser)->first();
        //dd($objeto->iduser);
        //$resultado->iduser=$objeto->iduser;
        $resultado=json_decode($estado->json);
        return $resultado;

    }

    
    


}
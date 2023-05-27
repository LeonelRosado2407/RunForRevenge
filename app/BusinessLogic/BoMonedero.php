<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Monedero;

class BoMonedero
{
    function save($objeto)
    {
        $monedero=Monedero::where('iduser',$objeto->iduser)->first();

        if(!$monedero)
        {
            //no existe
            $monedero=new Monedero();
            $monedero->iduser=$objeto->iduser;
            $monedero->coins=$objeto->coins;
            $monedero->save();


        }
        else
        {

            Monedero::where('iduser',$objeto->iduser)->delete();
            $monederonew=new Monedero();
            $monederonew->iduser=$objeto->iduser;
		    $monederonew->coins=$monedero->coins + $objeto->coins;
            $monederonew->save();

        }
        
        

    }
    

    function get($objeto)
    {
        $monedas = Monedero::where('iduser',$objeto->iduser)->first();
        return $monedas;
    }


    


}
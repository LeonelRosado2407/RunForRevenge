<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\LogCheckout;


class BoLogCheckout
{
    function registrar($objeto)
    {
        //dd($objeto);
        date_default_timezone_set("America/Merida");

        $log=new LogCheckout();
        $log->idskins=$objeto->idskins;
        $log->fecha=date('Y-m-d H:i:s');
        if(isset($objeto->pasarela)){
            $log->pasarela=$objeto->pasarela;
        }
        else{
            $log->pasarela='Stripe';  
        }

        $log->json=$objeto->json;
        $log->save();
             

    }


    


}
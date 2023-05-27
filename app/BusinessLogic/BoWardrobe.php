<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Wardrobe;
use App\Model\Compra;
use App\Model\Detalle_compra;

class BoWardrobe{



    function nueva_skin($objeto)
    {
        //dd($objeto);
        date_default_timezone_set("America/Merida");
        $wardrobe=Wardrobe::where('idskins',$objeto->idskins)->first();
        $user=auth()->user();
        $resultado=new \StdClass();

        $wardrobenew=new Wardrobe();
        $wardrobenew->idskins=$objeto->idskins;
        $wardrobenew->iduser=$user['iduser'];
        $wardrobenew->save();

        $compra=new Compra();
        $compra->idskins=$objeto->idskins;
        $compra->iduser=$user['iduser'];
        $compra->idstatus=1;
        $compra->fecha=date('Y-m-d H:i:s');
        $compra->save();
            
        $resultado->status='OK';

        return $resultado;
            


    }



}
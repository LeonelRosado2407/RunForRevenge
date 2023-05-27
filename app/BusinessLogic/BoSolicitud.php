<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Friends;
use App\Model\Solicitud;
use Illuminate\Routing\Redirector;


class BoSolicitud
{
    function solicitud($objeto){
        //$context = $objeto->all();
        //dd($objeto);
        $consulta=DB::select(
            'select
            iduser
            ,idfriend
            ,status
            from solicitud
            where iduser= '.$objeto->usuario.' and idfriend = '.$objeto->amigo.''
        );
        // dd($consulta);
    
        // dd($context);
        if(($objeto->status)==1){
            $consulta=DB::update(
                "UPDATE solicitud SET
                status = 1
                WHERE iduser = ".$objeto->usuario." AND idfriend = ".$objeto->amigo." LIMIT 1;"
            );
            $user= new Friends();
            $user->iduser=$objeto->usuario;
            $user->friend=$objeto->amigo;
            // dd($user);
            $user->save();

            $amigo= new Friends();
            $amigo->iduser=$objeto->amigo;
            $amigo->friend=$objeto->usuario;
            // dd($user);
            $amigo->save();

            // $datos = array();
            // $datos['usuario']=$user;
            // $datos['amigo']=$amigo;
            // $datos['status'] = $consulta;
            // dd($datos);
        }
        else{
            $consulta=Solicitud::select(
                'iduser'
                ,'idfriend'
                ,'status'
            )
            ->whereRaw("iduser = ".$objeto->usuario." and idfriend = ".$objeto->amigo."")
            ->delete();
            
        }

        return;

        
    }


    


}
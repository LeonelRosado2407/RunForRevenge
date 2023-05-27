<?php

namespace App\BusinessLogic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Partida;
use App\Model\Record;

class BoRecords
{

    function save($objeto)
    {
        $record=Record::where('iduser',$objeto->iduser)->first();


        if(!$record)
        {
            //no existe
            $recordnew=new Record();
            $recordnew->iduser=$objeto->iduser;
            $recordnew->score=$objeto->score;
            $recordnew->fecha=date('Y-m-d H:i:s');
            $recordnew->save();

            $records=Record::join('monedero','monedero.iduser','=','record.iduser')
                ->select(
                    "record.iduser"
                    ,"record.score"
                    ,"monedero.coins"
                )
                ->where('record.iduser','=',$objeto->iduser)
                ->get();
            $record2=array();


        }
        else
        {
            if($objeto->score > $record->score)
            {
                //dd("mayor");
                Record::where('iduser',$objeto->iduser)->delete();
                $recordn=new Record();
                $recordn->iduser=$objeto->iduser;
                $recordn->score=$objeto->score;
                $recordn->fecha=date('Y-m-d H:i:s');
                $recordn->save();

                $records=Record::join('monedero','monedero.iduser','=','record.iduser')
                ->select(
                    "record.iduser"
                    ,"record.score"
                    ,"monedero.coins"
                )
                ->where('record.iduser','=',$objeto->iduser)
                ->get();
                $record2=array();
            }
            else
            {
                $records=Record::join('monedero','monedero.iduser','=','record.iduser')
                ->select(
                    "record.iduser"
                    ,"record.score"
                    ,"monedero.coins"
                )
                ->where('record.iduser','=',$objeto->iduser)
                ->get();
                $record2=array();

            }
            

        }
        foreach($records as $row)
        {
           $record2[]=$row;
        }

        echo '{"perfil":'.json_encode($record2).'}';
    }

    function get_amigos($objeto)
    {

        $record_friend= \DB::select('select 
        
        u2.username as username
        ,partida.score as score
        from user as u1
        join friends on friends.iduser=u1.iduser
        join user as u2 on friends.friend = u2.iduser
        join partida on partida.iduser = u2.iduser
        where u1.iduser ='.$objeto->iduser.'
        order by partida.score desc' )
        ;
        $records=array();
		foreach($record_friend as $row)
		{
			$records[]=$row;
		}
        //$resultado->json=json_encode($estado->json);
        //return $resultado;
		
		echo '{"record":'.json_encode($records).'}';
 

    }

    function get_mi($objeto)
    {
        
		$recordsmi=Partida::where('iduser',$objeto->iduser)
        ->select(
            "partida.score"
           ,"partida.coins"
        )
        ->get();
		
		$records=array();
		foreach($recordsmi as $row)
		{
			$records[]=$row;
		}
        //$resultado->json=json_encode($estado->json);
        //return $resultado;
		
		echo '{"record":'.json_encode($records).'}';
 
 

    }

    






    


}
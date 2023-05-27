<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Solicitud;
use App\Model\Friends;
use Illuminate\Validation\Rules\Exists;
use App\Http\Controllers\PerfilController;


class SolicitudController extends Controller{
    public function listado(){
        $user=auth()->user();
        //dd($user);
        // $solicitudes=Solicitud::all();
        $solicitudes=DB::select(
            "select
            u1.iduser
            ,u2.iduser as idamigo
            ,u1.username as usuario
            ,u2.username as amigo
            ,solicitud.status
            from user as u1
            join solicitud on solicitud.iduser = u1.iduser
            join user as u2 on u2.iduser = solicitud.idfriend
            where u2.iduser = ".$user['iduser']." and solicitud.status = 0" 
        );
        // dd($solicitudes);
        $datos = array();
        $datos['solicitudes']=$solicitudes;
        return view('auth.profile')->with($datos);
    }


    public function aceptarsolicitud(Request $r){
        $context = $r->all();
        $consulta=DB::select(
            'select
            iduser
            ,idfriend
            ,status
            from solicitud
            where iduser= '.$context['usuario'].' and idfriend = '.$context['amigo'].''
        );
        // dd($consulta);
    
        // dd($context);
        if(($context['status'])==1){
            $consulta=DB::update(
                "UPDATE solicitud SET
                status = 1
                WHERE iduser = ".$context['usuario']." AND idfriend = ".$context['amigo']." LIMIT 1;"
            );
            $user= new Friends();
            $user->iduser=$context['usuario'];
            $user->friend=$context['amigo'];
            // dd($user);
            $user->save();

            $amigo= new Friends();
            $amigo->iduser=$context['amigo'];
            $amigo->friend=$context['usuario'];
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
            ->whereRaw("iduser = ".$context['usuario']." and idfriend = ".$context['amigo']."")
            ->delete();
            
        }
    

        
    }

    public function buscador(Request $r){
        $context= $r->all();
        // dd($context);
        
        if($r-> isMethod('POST')){
            $user=\DB::table('user')
            ->select(
                'iduser'
                ,'username'
                ,'idrol'
            )
            ->whereRaw("username like '%".$context['criterio']."%'")
            // ->first();
            ->get();
            // dd($user);
            $comprobacion=strlen($user);
            // dd($comprobacion);
            if($comprobacion==2){
                $datos=array();
                $datos['user']=$user;
                $datos['status']="No se encontraron jugadores";
                $datos['criterio']=$context['criterio'];



                // dd($datos);  
            }
            else{
                $datos=array();
                $datos['user']=$user;
                $datos['status']="se encontraron jugadores";
                $datos['criterio']=$context['criterio'];
            }
            
            // dd($datos);  

        }
        else{
            $datos=array();
            $datos['user']='';
            $datos['status']="No se realizo ninguna busqueda de jugadores";
            $datos['criterio']='';

         }
        return view('Solicitud.search')->with($datos);
    }

    public function solicitud(Request $r){
        $context=$r->all();
        $user=auth()->user();
        // dd($user);
        
        
        // dd($context);
        $verificacion = \DB::table('solicitud')
        ->select()
        ->whereRaw("iduser = ".$user['iduser']." and idfriend = ".$context['idusuario']."")
        ->first();
        // dd($verificacion);

        if(isset($verificacion)){
            dd('ýa existe una solicitud');
            $r['criterio']='';
            return $this->buscador($r);
        }
        else{
            $solicitud = new Solicitud();
            $solicitud->iduser= $user['iduser'];
            $solicitud->idfriend = $context['idusuario'];
            $solicitud->status = 0 ;
            $solicitud->save();
            $r['criterio']='';
            return $this->buscador($r);

        }

    }
    

}



?>
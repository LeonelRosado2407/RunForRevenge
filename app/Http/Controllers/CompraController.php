<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Skins;
use App\pagos\StripeProcessor;

use App\BusinessLogic\BoWardrobe;

class CompraController extends Controller
{
    public function vcompra(Request $r){

        $datos=$r->all();
        //$skin=Skins::find($datos['idskins']);
        $skins = Skins::where('idskins', $datos['idskins'])->get();
        $datos=array();
		$datos['lista']=$skins; 
	
        //dd($datos);
    	return view('Compra.vcompra')->with($datos); 

    }

    public function mostrar_foto($nombre_foto)
	{
		$path = storage_path('app/fotos/'.$nombre_foto);

		if (!File::exists($path))
		{
			abort(404);
		}

		$file = File::get($path);
		$type = File::mimeType($path);
		$response = Response::make($file,200);
		$response->header("Content-Type",$type);
		return $response;
	}


	public function realizar_pago(Request $r)
	{
		///dd($r);
		$datos=$r->all();
		$user=auth()->user();
        //$skin=Skins::find($datos['idskins']);
        $skins = Skins::where('idskins', $datos['idskins'])->first();

		//dd($datos['token_stripe']);

		//aqui se procesa el pago
		$stripe=new StripeProcessor();
		$objeto_pago=new \StdClass();
		$objeto_pago->amount=$skins->price*100;
		//dd($objeto_pago->amount);
		$objeto_pago->currency_code='MXN';
		$objeto_pago->producto=$skins->skinname;
		$objeto_pago->email=$user['email'];
		$objeto_pago->token=$datos['token_stripe'];
		$objeto_pago->item_number=$skins->idskins;

		$stripeResponse= $stripe->enviar_datos_pago($objeto_pago);
		//dd($stripeResponse);
		//Poner todos los processos de post venta 
		if($stripeResponse->status=='OK'){

			//dd($stripeResponse->status);
			
			$bowardrobe=new BoWardrobe();
			$objeto_status=new \StdClass();
			$objeto_status->idskins=$skins->idskins;
			$res_status=$bowardrobe->nueva_skin($objeto_status);


		}
		//dd($datos);
		return response()->json($stripeResponse);
		

	}






    




}


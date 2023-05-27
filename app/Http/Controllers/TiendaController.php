<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Skins;
use App\Model\Wardrobe;

class TiendaController extends Controller{
	
	public function listado()
    {
        $user = auth()->user();
		$userId = $user['iduser'];

		$resultado = DB::table('skins')
					->leftJoin('wardrobe', function($join) use ($userId) {
						$join->on('skins.idskins', '=', 'wardrobe.idskins')
							->where('wardrobe.iduser', '=', $userId);
					})
					->select('skins.*')
					->whereNull('wardrobe.iduser')
					->get();
        $datos = array();
        $datos['lista'] = $resultado;
   
        return view('Tienda.listado')->with($datos);
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

}
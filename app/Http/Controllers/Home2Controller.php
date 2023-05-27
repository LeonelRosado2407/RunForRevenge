<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Partida;
use App\Model\Coins;

class Home2Controller extends BaseController
{
    public function listado(){
        return View('Home.home2');
        // return View('Home.home');

    }

}
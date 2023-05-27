<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function listado()
    {
        $users=User::all();
        $datos=array();
        $datos['lista']=$users;
        return view('User.listado')->with($datos);
    }
}
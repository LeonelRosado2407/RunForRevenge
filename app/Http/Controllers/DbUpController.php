<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Orden;
use App\Model\Skins;
use App\Model\Tipopago;
use App\Model\Detalle_orden;
use App\Model\Record;
use App\Model\Coins;
use App\Model\Friends;
use App\Model\Wardrobe;
use App\Model\Status;
use Faker\Factory as Faker;
//use App\BusinessLogic\BoReporte;

class DbUpController extends Controller
{
    public function user()
    {
        //datos
        /*
        -username
        -password
        -email
        -idrol
        */
        $faker = Faker::create();
        $rol=array('3');
        for($i=1;$i<=100;$i++)
        {
            $user=new User();
            $user->username=$faker->name;
            $user->password=bcrypt($faker->password);
            $user->email=$user->username.'@gmail.com';
            $user->idrol='3';
            $user->save();


        }


        

    }

    public function orden()
    {
         //datos
        /*
        -fecha
        -iduser
     -idskins
        -idtipopago
        -status
        */
        $faker = Faker::create();
        $user=User::all();
        $tipopago=Tipopago::all();
        $skins=Skins::all();
        $status=Status::all();
        for($i=1;$i<=100;$i++)
        {
            $orden=new Orden();
            $orden->fecha=$faker->dateTimeBetween($startDate = '-4 month', $endDate = 'now');
            $orden->iduser=$user->random()->iduser;  
            $orden->idtipopago=$tipopago->random()->idtipopago;
            $orden->idstatus=$status->random()->idstatus;
            $orden->save();
        }
    }

    public function detalle()
    {
          //detalle_orden
    /*+
    -idskins
    -idorden
    -precio
    -cantidad
    */

    $faker = Faker::create();
    $skins=Skins::all();
    $ordenes=Orden::all();
    for($i=1;$i<=100;$i++)
    {
        $detalle= new Detalle_orden();
        $detalle->idskins=$skins->random()->idskins;
        $detalle->idorden=$ordenes->random()->idorden;
        $detalle->precio=$faker->regexify('([2-9]){3}');
        $detalle->cantidad=$faker->numberBetween(1,6);
        $detalle->save();


    }


    }
  

    //record
    
     /*+
    idrecord
    iduser
    score
    fecha

    */
    public function record()
    {
        $faker = Faker::create();
        $user=User::all();
        for($i=1;$i<=100;$i++)
        {
            $record=new Record();
            $record->iduser=$user->random()->iduser;
            $record->score=$faker->regexify('([2-9]){6}');
            $record->fecha=$faker->dateTimeBetween($startDate = '-4 month', $endDate = 'now');
            $coins=new Coins();
            $coins->iduser=$record->iduser;
            $coins->coins=$faker->regexify('([2-9]){3}');
            $coins->fecha=$record->fecha;
            $record->save();
            $coins->save();



        }
        

    }

    public function amigos()
    {
        $faker = Faker::create();
        $user=User::all();   
        for($i=1;$i<=100;$i++)
        {
            $amigos=new Friends();
            $amigos->iduser=$user->random()->iduser;
            $amigos->friend=$user->random()->iduser; 
            $amigos->save();



        }

    }

    public function wardrobe()
    {
        $faker = Faker::create();
        $user=User::all();
        $skins=Skins::all();   
        for($i=1;$i<=100;$i++)
        {
            $wa=new Wardrobe();
            $wa->iduser=$user->random()->iduser;
            $wa->idskins=$skins->random()->idskins; 
            $wa->save();



        }

    }





}

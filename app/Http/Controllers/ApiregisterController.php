<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Monedero;
use App\Model\Record;
use App\Model\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;


class ApiregisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'idrol' => 'required|int',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'idrol' => $data['idrol'],
            'password' => bcrypt($data['password']),

        ]); 
    }


    public function register(Request $request)
    {
    

        $this->validator($request->all())->validate();
        //aqui se agrega el usuario
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
            //voy a dar de alta un socio
            //aqui asigno al socio nuevo el id de usuario nuevo
        $monedero=new Monedero();
        $monedero->iduser=$user->iduser;
        $monedero->coins=0;
        $monedero->save();
        $recordnew=new Record();
        $recordnew->iduser=$user->iduser;
        $recordnew->score=0;
        $recordnew->fecha=date('Y-m-d H:i:s');
        $recordnew->save();

        $usuario=Usuario::find($user->iduser);
        $usuario->foto="fotos/foto-1679412589.png";
        $usuario->save();
        
        $user2=auth()->user(); 
        $resultado=new \StdClass();
        $resultado=Monedero::join('user','user.iduser','=','monedero.iduser')
        ->join('record','record.iduser','=','monedero.iduser')
        ->select(

             "user.iduser"
            ,"user.username"
            ,"monedero.coins"
            
        )
		->where('monedero.iduser','=',$user2['iduser'])
        ->get();
        
        //return response()->json($resultado);
        echo '{"perfil":'.json_encode($resultado).'}';



            //hace un login automatico del usuario
            //$this->guard()->login($user);

            
    }


}

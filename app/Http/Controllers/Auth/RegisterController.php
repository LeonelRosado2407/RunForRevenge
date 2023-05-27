<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Model\Usuario;
use App\Model\Rol;
use App\Model\Monedero;
use App\Model\Record;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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
    protected $redirectTo = '/Home';

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


    function formulario_registro()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if($request->exists('esuser'))
        {
           //aqui se da de alta el socio debe estar el rol
           $request->request->add(['idrol'=>3]); 

        }

        $this->validator($request->all())->validate();


        //aqui se agrega el usuario
        event(new Registered($user = $this->create($request->all())));


            $usuario=Usuario::find($user->iduser);
            $usuario->foto="fotos/foto-1679412589.png";
            $usuario->save();
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
            $this->guard()->login($user);
            $this->redirectTo='/Home';
            
        

            //hace un login automatico del usuario
            //$this->guard()->login($user);

            return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
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
		//dd($response);
		return $response;
	}
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    */


    function showLoginForm(){
        return view('auth.login');
    }

    protected function redirectTo()
    {
        //CON LA FUNCION AUTH USER RECUPERAMOS EL MODELO DEL USUARIO QUE ESTA EN LA SESION DEL SISTEMA
        //dd(auth()->user());
        
        //if(auth()->user()->idrol == '5')

        switch(auth()->user()->idrol)
        {
            case 1:  
            return '/user/perfil';
            break;
            case 2:
            return dd('admins');
            break;
            case 3:
            return '/Home'; 
            break;
        }
        


    }


    protected function sendFailedLoginResponse(Request $request)
    {
        //dd('login malo');
        //$errors = [$this->username() => trans('auth.failed')];
        $errors = [$this->username() => 'login incorrecto'];
        return redirect()->back()
            ->withInput($request->only($this->username(),'remember'))
            ->withErrors($errors);
    }


}


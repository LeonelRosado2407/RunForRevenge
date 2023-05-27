<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Model\Usuario;


class AuthapiController extends Controller{
    
    public function register(Request $r)
    {
        
        $validator = Validator::make($r->all(),[
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'idrol' => 'required|int',
        ]);

        if($validator->fails())
        {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);

        }

        $input = $r->all();
        $input['password'] = bcrypt($input['password']);
        $usuario = Usuario::create($input);

        $success['token'] = $usuario->createToken('myapp')->plainTextToken;
        $success['username'] = $usuario->username;

        $response = [
             'success' => true,
             'data' => $success,
             'message' => 'usuario registrado'

        ];

        return response()->json($response,200);
        


    }

    public function login(Request $r)
    {
        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password]))
        {
            $usuario = Auth::user();
            $success['token'] = $usuario->createToken('')->plainTextToken;
            $success['username'] = $usuario->username;
    
            $response = [
                 'success' => true,
                 'data' => $success,
                 'message' => 'usuario registrado'
    
            ];
            return response()->json($response,200);

        }
        else
        {
            $response = [
                'success' => false,
                'message' => 'no login'
   
           ];
           return response()->json($response);

        }



    }



}
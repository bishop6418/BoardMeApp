<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        $login = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
          ]);

        $user = User::where('email',$request->email)->first();

        if (!Auth::attempt( $login ))
        {
           return response(['message' => 'login Cresentials are incorrect']);
        }

        $token = $user->createToken('authToken')->accessToken;

        return response(['user' => Auth::user(), 'access_token' => $token]);
    }

    public function logout(Request $request)
    {
        if(Auth::logout()){
            return response(['message' => 'successfully logged out']);
        }

    }
}

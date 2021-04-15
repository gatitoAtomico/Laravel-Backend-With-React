<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function login(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();
            $token = $user->createToken('app')->accessToken;

            return response([

                'message' => 'success',
                'token' => $token,
                'user' => $user,

            ]);

        }

        return response()->json([

            'message' => 'Credentials didnt match any records ',

        ],401);

    }


    public function user()
    {

        return Auth::user();
    }


    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>  bcrypt ($request->input('password')),
        ]);

        return response([
            'user' => $user
        ], 200);

    }

}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = Auth::user()->createToken('TokenName')->accessToken;

            return response()->json(['token' => $token, 'user' => $user], Response::HTTP_OK);
        } else {
            return response()->json(
                ['message' => 'Email atau Password Salah'],
                Response::HTTP_UNAUTHORIZED
            );
        }
    }
}

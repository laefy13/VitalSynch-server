<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    
    public function authenticate(Request $request): JsonResponse
    {

        
        $credentials = $request->validate([
            'usr_email' => ['required', 'email'],
            'usr_password' => ['required'],
        ]);

        $credentials['password'] = $credentials['usr_password'];
        unset($credentials['usr_password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->plainTextToken;

            return response()->json([
                'token' => $token,
                'id' => $user->id
        ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

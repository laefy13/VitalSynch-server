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
            'ptnt_email' => ['required', 'email'],
            'ptnt_password' => ['required'],
        ]);

        $credentials['password'] = $credentials['ptnt_password'];
        unset($credentials['ptnt_password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user);
            $token = $user->createToken('MyAppToken')->plainTextToken;

            return response()->json([
                'token' => $token,
                'id' => $user->ptnt_id
        ])->cookie('authToken', $token, 60 * 24 * 30, null, null, false, true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
        
    }

    
    // public function authenticate(Request $request): JsonResponse
    // {
    //     if ($request->user == 'doctor') {
    //         return $this->validateAccount($request, 'doctor');
    //     } elseif ($request->user == 'ptnt') {
    //         return $this->validateAccount($request, 'ptnt');
    //     }

    //     return response()->json(['error' => 'Invalid user type'], 400);
    // }

    // private function validateAccount(Request $request, $account): JsonResponse
    // {
    //     $credentials = $request->validate([
    //         "{$account}_email" => ['required', 'email'],
    //         "password" => ['required'],
    //     ]);

    //     if (Auth::guard($account)->attempt($credentials)) {
    //         //["{$account}_email" => $request["{$account}_email"], 'password' => $request["{$account}_password"]]
           
    //         $user = Auth::user();
    //         $token = $user->createToken('MyAppToken')->plainTextToken;

    //         return response()->json([
    //             'token' => $token,
    //             'id' => $user->id,
    //         ])->cookie('authToken', $token, 60 * 24 * 30, null, null, false, true);
    //     }

    //     return response()->json(['error' => "{$account} authentication failed"], 401);
    // }
}

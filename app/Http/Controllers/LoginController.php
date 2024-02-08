<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientProfile;
use App\Models\DoctorProfile;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    
    // public function authenticate(Request $request): JsonResponse
    // {

    //     // single model auth
    //     $credentials = $request->validate([
    //         'ptnt_email' => ['required', 'email'],
    //         'ptnt_password' => ['required'],
    //     ]);

    //     $credentials['password'] = $credentials['ptnt_password'];
    //     unset($credentials['ptnt_password']);

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         // dd($user);
    //         $token = $user->createToken('MyAppToken')->plainTextToken;

    //         return response()->json([
    //             'token' => $token,
    //             'id' => $user->ptnt_id
    //     ])->cookie('authToken', $token, 60 * 24 * 30, null, null, false, true);
    //     }

    //     return response()->json(['error' => 'Unauthorized'], 401);
        
    // }

    
    public function authenticate(Request $request): JsonResponse
    {
        if ($request->user == 'doctor') {
            return $this->validateAccount($request, 'doctor');
        } elseif ($request->user == 'ptnt') {
            return $this->validateAccount($request, 'ptnt');
        }

        return response()->json(['error' => 'Invalid user type'], 400);
    }
    // old with the dds
    // private function validateAccount(Request $request, $account): JsonResponse
    // {
    //     $credentials = $request->validate([
    //         "{$account}_email" => ['required', 'email'],
    //         "{$account}_password" => ['required'],
    //     ]);

    //     // $credentials['password'] = $credentials['ptnt_password'];
    //     // unset($credentials['ptnt_password']);
    //     // dd(Auth::guard($account)->check());

    //     $email = $request->get("{$account}_email");
    //     $password = $request->get("{$account}_password");
    //     $user = Auth::guard($account)->getProvider()->retrieveByCredentials([$account . '_email' => $email]);
    //     $user_password = $user->getAuthPassword();
    //     dd([
    //         'Stored Password' => $user_password,
    //         'Provided Password' => $password,
    //         'Hash Check Result' => Hash::check($password, $user_password),
    //         'Hased ppassword' => Hash::make($password),
    //         Auth::guard($account)->attempt([$account . '_email' => $email, 'password' => $password])
    //     ]);
    //     // if ($user && Hash::check($password, $user_password)) {
    //     //     dd('Credentials are valid');
    //     //     // rest of the code
    //     // }
    //     // dd('Credentials arent valid',$user_password,$password ,Hash::check($password, $user_password),Hash::make($password));
    //     if (Auth::guard($account)->attempt([$account . '_email' => $email, 'password' => $password])) {
    //         //["{$account}_email" => $request["{$account}_email"], 'password' => $request["{$account}_password"]]
    //         $user = PatientProfile::where('ptnt_email', $email)->first();
    //         Auth::guard($account)->setUser($user);
    //         $auth_user = Auth::guard($account)->User();
    //         $token = $user->createToken('MyAppToken')->plainTextToken;
            
    //         return response()->json([
    //             'token' => $token,
    //             'id' => $user['ptnt_id'],
    //         ])->cookie('authToken', $token, 60 * 24 * 30, null, null, false, true);
    //     }

    //     return response()->json(['error' => "{$account} authentication failed"], 401);
    // }
    // new
    private function validateAccount(Request $request, $account): JsonResponse
    {
        $credentials = $request->validate([
            "{$account}_email" => ['required', 'email'],
            "{$account}_password" => ['required'],
        ]);

        $email = $request->get("{$account}_email");
        $password = $request->get("{$account}_password");
        $user = Auth::guard($account)->getProvider()->retrieveByCredentials([$account . '_email' => $email]);
        // dd($user);
        $saved_password = $user->getAuthPassword();
        // if (Auth::guard($account)->attempt([$account . '_email' => $email, 'password' => $password])) {
        if($user && Hash::check($password,$saved_password)){
            $model = ($account === 'ptnt') ? PatientProfile::class : DoctorProfile::class;
            $user = $model::where("{$account}_email", $email)->first();
            Auth::guard($account)->setUser($user);
            $auth_user = Auth::guard($account)->User();
            $token = $auth_user->createToken('MyAppToken')->plainTextToken;
            
            return response()->json([
                'token' => $token,
                'id' => $user["{$account}_id"],
            ])->cookie('authToken', $token, 60 * 24 * 30, null, null, false, true);
        }

        return response()->json(['error' => "{$account} authentication failed"], 401);
    }
}

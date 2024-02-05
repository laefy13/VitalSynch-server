<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserAccounsController extends Controller
{
    //


    public function index(){
        $user_acc = UserAccounts::all();
        return response()->json($user_acc);
    }

    public function single($id){
        $user_acc = DB::select('SELECT * 
                                FROM tbl_user_account
                                WHERE id = ?',[$id]);
        return response()->json($user_acc);
    }
    

    public function pk(){
        $user_acc = DB::select('SELECT usr_email 
                                FROM tbl_user_accounts');
        return response()->json($user_acc);
    }

    public function store(Request $request){
        $user_acc = new UserAccounts ; 
        $user_acc->usr_email = $request->usr_email;
        $user_acc->usr_password = Hash::make($request->usr_password);
        $user_acc->usr_username = $request->usr_username;
        $user_acc->usr_acc_type = $request->usr_acc_type;

        $user_acc->save();
        return response()->json([
            "message" => "User Account added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('usr_email') ){
            return response()->json([
                'error' => 'User Email not provided'
            ], 400);
        }

        $user_acc_update = [];

        if ($request->has('usr_email')){
            if (UserAccounts::where('usr_email',$request->usr_email)->exists()){
                return response()->json([
                    'error' => 'Email already exists'
                ], 409);
            }
            $user_acc_update['usr_email'] = $request->usr_email;
        }
        if ($request->has('usr_username')){
            $user_acc_update['usr_username'] = $request->usr_username;
        }

        if ($request->has('usr_password')){
            $user_acc_update['usr_password'] = Hash::make($request->usr_password);
        }

        if ($request->has('usr_acc_type')){
            $user_acc_update['usr_acc_type'] = $request->usr_acc_type;
        }



        UserAccounts::where('usr_email',$request->usr_email)
        ->update($user_acc_update);

        return response()->json([
            "message" => "User Account updated"
        ],201);

    }

}

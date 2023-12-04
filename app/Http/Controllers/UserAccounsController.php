<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccounts;
use Illuminate\Support\Facades\Hash;

class UserAccounsController extends Controller
{
    //


    public function index(){
        $user_acc = UserAccounts::all();
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

}

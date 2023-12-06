<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;

class LogsController extends Controller
{
   

    public function index(){
        $logs = Logs::all();
        return response()->json($logs);
    }
    public function store(Request $request){
        $logs = new Logs ; 
        $logs->log_usr_username = $request->log_usr_username;
        $logs->log_app_queue_num = $request->log_app_queue_num;
        $logs->log_action = $request->log_action;


        $logs->save();
        return response()->json([
            "message" => "Log added"
        ],201);

    }
}

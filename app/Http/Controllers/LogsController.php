<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
   

    public function index(){
        $user = Auth::user();

        // Check if a user is authenticated
        if (Auth::check()) {
            return response()->json($user);
        } else {
            // User is not authenticated
            return response()->json('ky');
        $logs = Logs::all();
        return response()->json($logs);
        }
    }

    public function pk(){
        $logs = DB::select('SELECT log_id
                                FROM tbl_logs');
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

    public function update(Request $request){
        if (!$request->has('log_id') ){
            return response()->json([
                'error' => 'Log ID not provided'
            ], 400);
        }

        $log_update = [];

        if ($request->has('log_usr_username')){
            $log_update['log_usr_username'] = $request->log_usr_username;

        }
        if ($request->has('log_app_queue_num')){
            $log_update['log_app_queue_num'] = $request->log_app_queue_num;

        }
        if ($request->has('log_action')){
            $log_update['log_action'] = $request->log_action;

        }

        Logs::where('log_id',$request->log_id)
        ->update($log_update);

        return response()->json([
            "message" => "Log updated"
        ],201);

    }

}

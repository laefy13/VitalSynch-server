<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\DB;
class AppFormController extends Controller
{
    //

    public function index(){
        $app_form = ApplicationForm::all();
        return response()->json($app_form);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_app_form
                                WHERE app_queue_num = ?',[$id]);
        return response()->json($row);
    }

    public function pk(){
        $app_form = DB::select('SELECT app_queue_num 
                                FROM tbl_app_form');
        return response()->json($app_form);
    }

    public function store(Request $request){
        $app_form = new ApplicationForm ; 
        $app_form->app_full_name = $request->app_full_name;
        $app_form->app_department = $request->app_department;
        $app_form->app_service = $request->app_service;
        $app_form->app_email = $request->app_email;

        $app_form->save();
        return response()->json([
            "message" => "Application Form added"
        ],201);

    }

    // I dont think this should not be updated but well
    public function update(Request $request){
        if (!$request->has('app_queue_num') ){
            return response()->json([
                'error' => 'Application form Queue Num not provided'
            ], 400);
        }

        $app_update = [];

        if ($request->has('app_full_name')){
            $app_update['app_full_name'] = $request->app_full_name;
        }
        if ($request->has('app_department')){
            $app_update['app_department'] = $request->app_department;
        }

        if ($request->has('app_service')){
            $app_update['app_service'] = $request->app_service;
        }

        if ($request->has('app_email')){
            $app_update['app_email'] = $request->app_email;
        }


        ApplicationForm::where('app_queue_num',$request->app_queue_num)
        ->update($app_update);

        return response()->json([
            "message" => "Application Form updated"
        ],201);

    }

}

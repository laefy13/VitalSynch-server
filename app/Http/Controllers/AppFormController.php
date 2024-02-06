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

    public function single_patient($id){
        $row = DB::select('SELECT * 
                                FROM tbl_app_form
                                WHERE app_patient_id = ?',[$id]);
        return response()->json($row);
    }
    public function single_doctor($id){
        $row = DB::select('SELECT * 
                                FROM tbl_app_form
                                WHERE app_doctor_id = ?',[$id]);
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
        $app_form->app_patient_id = $request->app_patient_id;
        $app_form->app_doctor_id = $request->app_doctor_id;
        $app_form->app_date = $request->app_date;
        $app_form->app_time = $request->app_time;
        $app_form->app_is_accepted = $request->app_is_accepted;
        $app_form->app_reason = $request->app_reason;

        $app_form->save();
        return response()->json([
            "message" => "Application Form added"
        ],201);

    }

    // I dont think this should be updatable but well
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
        if ($request->has('app_patient_id')){
            $app_update['app_patient_id'] = $request->app_patient_id;
        }
        if ($request->has('app_doctor_id')){
            $app_update['app_doctor_id'] = $request->app_doctor_id;
        }
        if ($request->has('app_date')){
            $app_update['app_date'] = $request->app_date;
        }
        if ($request->has('app_time')){
            $app_update['app_time'] = $request->app_time;
        }
        if ($request->has('app_is_accepted')){
            $app_update['app_is_accepted'] = $request->app_is_accepted;
        }
        if ($request->has('app_reason')){
            $app_update['app_reason'] = $request->app_reason;
        }


        ApplicationForm::where('app_queue_num',$request->app_queue_num)
        ->update($app_update);

        return response()->json([
            "message" => "Application Form updated"
        ],201);

    }

}

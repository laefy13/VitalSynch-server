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

    // public function single_patient($id){
    //     $row = DB::select('SELECT * 
    //                             FROM tbl_app_form
    //                             WHERE app_patient_id = ?',[$id]);
    //     return response()->json($row);
    // }
    // public function single_doctor($id){
    //     $row = DB::select('SELECT * 
    //                             FROM tbl_app_form
    //                             WHERE app_doctor_id = ?',[$id]);
    //     return response()->json($row);
    // }

    public function pk(){
        $app_form = DB::select('SELECT app_queue_num 
                                FROM tbl_app_form');
        return response()->json($app_form);
    }

    public function store(Request $request){
        $app_form = new ApplicationForm ; 
        $app_form->app_full_name = $request->app_full_name;
        $app_form->app_birth_date = $request->app_birth_date;
        $app_form->app_address = $request->app_address;
        $app_form->app_contact_num = $request->app_full_name;
        $app_form->app_sex = $request->app_sex;
        $app_form->app_symptoms = $request->app_symptoms;
        $app_form->app_department = $request->app_department;
        $app_form->app_service = $request->app_service;
        // $app_form->app_email = $request->app_email;
        // $app_form->app_patient_id = $request->app_patient_id;
        $app_form->app_doctor_name = $request->app_doctor_name;
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

        $fillableFields = [
            'app_full_name', 'app_department', 'app_service', 'app_email',
            'app_patient_id', 'app_doctor_id', 'app_date', 'app_time',
            'app_is_accepted', 'app_reason'
        ];

        foreach ($fillableFields as $field) {
            if ($request->has($field)) {
                $app_update[$field] = $request->$field;
            }
        }


        ApplicationForm::where('app_queue_num',$request->app_queue_num)
        ->update($app_update);

        return response()->json([
            "message" => "Application Form updated"
        ],201);

    }

}

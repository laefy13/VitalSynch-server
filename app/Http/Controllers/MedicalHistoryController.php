<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use Illuminate\Support\Facades\DB;

class MedicalHistoryController extends Controller
{

    public function index(){
        $med_his = MedicalHistory::all();
        return response()->json($med_his);
    }

    public function pk(){
        $med_his = DB::select('SELECT medhis_id
                                FROM tbl_med_history');
        return response()->json($med_his);
    }

    public function store(Request $request){
        $med_his = new MedicalHistory ; 
        $med_his->medhis_ptnt_id = $request->medhis_ptnt_id;
        $med_his->medhis_record_date = $request->medhis_record_date;
        $med_his->medhis_record_time = $request->medhis_record_time;
        $med_his->medhis_height = $request->medhis_height;
        $med_his->medhis_weight = $request->medhis_weight;
        $med_his->medhis_blood_pressure = $request->medhis_blood_pressure;
        $med_his->medhis_glucose = $request->medhis_glucose;
        $med_his->medhis_illness = $request->medhis_illness;

        $med_his->save();
        return response()->json([
            "message" => "Medical History added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('medhis_id') ){
            return response()->json([
                'error' => 'Medical History ID not provided'
            ], 400);
        }

        $medhis_update = [];

        if ($request->has('medhis_ptnt_id')){
            $medhis_update['medhis_ptnt_id'] = $request->medhis_ptnt_id;

        }
        if ($request->has('medhis_record_date')){
            $medhis_update['medhis_record_date'] = $request->medhis_record_date;

        }

        if ($request->has('medhis_record_time')){
            $medhis_update['medhis_record_time'] = $request->medhis_record_time;

        }

        if ($request->has('medhis_height')){
            $medhis_update['medhis_height'] = $request->medhis_height;

        }

        if ($request->has('medhis_weight')){
            $medhis_update['medhis_weight'] = $request->medhis_weight;

        }

        if ($request->has('medhis_blood_pressure')){
            $medhis_update['medhis_blood_pressure'] = $request->medhis_blood_pressure;

        }

        if ($request->has('medhis_glucose')){
            $medhis_update['medhis_glucose'] = $request->medhis_glucose;

        }

        if ($request->has('medhis_illness')){
            $medhis_update['medhis_illness'] = $request->medhis_illness;

        }


        MedicalHistory::where('medhis_id',$request->medhis_id)
        ->update($medhis_update);

        return response()->json([
            "message" => "Medical History updated"
        ],201);

    }
}

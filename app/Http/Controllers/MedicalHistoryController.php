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
        $med_his = MedicalHistory::create([
            'medhis_ptnt_id' => $request->medhis_ptnt_id,
            'medhis_record_date' => Carbon::parse($request->medhis_record_date)->format('Y-m-d'),
            'medhis_record_time' => Carbon::parse($request->medhis_record_time)->format('H:i:s'),
            'medhis_height' => $request->medhis_height,
            'medhis_weight' => $request->medhis_weight,
            'medhis_blood_pressure' => $request->medhis_blood_pressure,
            'medhis_glucose' => $request->medhis_glucose,
            'medhis_illness' => $request->medhis_illness,
        ]);
        
        return response()->json(["message" => "Medical History added"], 201);
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

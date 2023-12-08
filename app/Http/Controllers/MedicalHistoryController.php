<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;

class MedicalHistoryController extends Controller
{

    public function index(){
        $med_his = MedicalHistory::all();
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
}

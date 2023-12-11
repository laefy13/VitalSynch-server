<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{


    public function index(){
        $prescr = Prescription::all();
        return response()->json($prescr);
    }

    public function pk(){
        $prescr = DB::select('SELECT prescr_id
                                FROM tbl_prescription');
        return response()->json($prescr);
    }


    public function store(Request $request){
        $prescr = new Prescription ; 
        $prescr->prescr_ptnt_id = $request->prescr_ptnt_id;
        $prescr->prescr_doctor_id = $request->prescr_doctor_id;
        $prescr->prescr_date = $request->prescr_date;
        $prescr->prescr_time = $request->prescr_time;


        $prescr->save();
        return response()->json([
            "message" => "Prescription added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('prescr_id') ){
            return response()->json([
                'error' => 'Prescription ID not provided'
            ], 400);
        }

        $prescr_update = [];

        if ($request->has('prescr_ptnt_id')){
            $prescr_update['prescr_ptnt_id'] = $request->prescr_ptnt_id;

        }
        if ($request->has('prescr_doctor_id')){
            $prescr_update['prescr_doctor_id'] = $request->prescr_doctor_id;

        }
        if ($request->has('prescr_date')){
            $prescr_update['prescr_date'] = $request->prescr_date;

        }
        if ($request->has('prescr_time')){
            $prescr_update['prescr_time'] = $request->prescr_time;

        }

        prescr::where('prescr_id',$request->prescr_id)
        ->update($prescr_update);

        return response()->json([
            "message" => "Prescription updated"
        ],201);

    }
}

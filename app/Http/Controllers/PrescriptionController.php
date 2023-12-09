<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{


    public function index(){
        $prescr = Prescription::all();
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
}

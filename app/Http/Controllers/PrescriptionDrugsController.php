<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrescriptionDrugs;

class PrescriptionDrugsController extends Controller
{
    //

    public function index(){
        $pd = PrescriptionDrugs::all();
        return response()->json($pd);
    }
    public function store(Request $request){
        $pd = new PrescriptionDrugs ; 
        $pd->pd_prescr_id = $request->pd_prescr_id;
        $pd->pd_drug_id = $request->pd_drug_id;
        $pd->pd_instruction = $request->pd_instruction;


        $pd->save();
        return response()->json([
            "message" => "Prescription Drugs added"
        ],201);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrescriptionDrugs;
use Illuminate\Support\Facades\DB;

class PrescriptionDrugsController extends Controller
{
    //

    public function index(){
        $pd = PrescriptionDrugs::all();
        return response()->json($pd);
    }

    public function pk(){
        $pd = DB::select('SELECT pd_prescr_id 
                                FROM tbl_prescription_drugs');
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

    public function update(Request $request){
        if (!$request->has('pd_prescr_id') ){
            return response()->json([
                'error' => 'Prescription Drug ID not provided'
            ], 400);
        }

        $pd_update = [];

        if ($request->has('pd_prescr_id')){
            $pd_update['pd_prescr_id'] = $request->pd_prescr_id;
        }
        if ($request->has('pd_drug_id')){
            $pd_update['pd_drug_id'] = $request->pd_drug_id;
        }
        if ($request->has('pd_instruction')){
            $pd_update['pd_instruction'] = $request->pd_instruction;
        }


        PrescriptionDrugs::where('pd_prescr_id',$request->pd_prescr_id)
        ->update($pd_update);

        return response()->json([
            "message" => "Prescription Drug updated"
        ],201);

    }


}

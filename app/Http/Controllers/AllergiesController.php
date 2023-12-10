<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergies;
use Illuminate\Support\Facades\DB;

class AllergiesController extends Controller
{
    
    public function index(){
        $allergy = Allergies::all();
        return response()->json($allergy);
    }

    public function pk(){
        $allergy = DB::select('SELECT allrgy_id, allrgy_name 
                                FROM tbl_allergies');
        return response()->json($allergy);
    }

    public function store(Request $request){
        $allergy = new Allergies ; 
        $allergy->allrgy_name = $request->allrgy_name;
        $allergy->allrgy_type = $request->allrgy_type;
        $allergy->allrgy_severity = $request->allrgy_severity;
        $allergy->allrgy_notes = $request->allrgy_notes;


        $allergy->save();
        return response()->json([
            "message" => "Allergy added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('allrgy_ids') ){
            return response()->json([
                'error' => 'Allergy ID not provided'
            ], 400);
        }

        $allrgy_update = [];

        if ($request->has('allrgy_name')){
            $allrgy_update['allrgy_name'] = $request->allrgy_name;

        }
        if ($request->has('allrgy_type')){
            $allrgy_update['allrgy_type'] = $request->allrgy_type;

        }
        if ($request->has('allrgy_severity')){
            $allrgy_update['allrgy_severity'] = $request->allrgy_severity;

        }
        if ($request->has('allrgy_notes')){
            $allrgy_update['allrgy_notes'] = $request->allrgy_notes;

        }

        Allergies::where('allrgy_id',$request->allrgy_id)
        ->update($allrgy_update);

        return response()->json([
            "message" => "Allergy updated"
        ],201);

    }

}

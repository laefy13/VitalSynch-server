<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergies;

class AllergiesController extends Controller
{
    
    public function index(){
        $allergy = Allergies::all();
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
}

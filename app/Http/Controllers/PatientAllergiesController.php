<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientAllergies;
use App\Models\PatientProfile;
use App\Models\Allergies;

class PatientAllergiesController extends Controller
{
    
    public function index(){
        # mhm i think a left join would be better here, with the tbl_allergies and
        # if other info of ptnt are needed
        $pat_all = PatientAllergies::all();
        return response()->json($pat_all);
    }
    public function store(Request $request){
        try{
            if (!PatientProfile::where('ptnt_id', $request->pa_ptnt_id)->exists()) {
                return response()->json(['error' => 'Patient ID not found.'], 404);
            }
            $pa_allrgy_id = json_decode($request->input('pa_allrgy_id'), true);
            // dd(!is_array($pa_allrgy_id),$pa_allrgy_id);
            if (!$request->has('pa_allrgy_id') || !is_array($pa_allrgy_id)) {
                return response()->json(['error' => 'Allergies not provided or invalid format.'], 400);
            }

            foreach ($pa_allrgy_id as $allergyId) {
                if (!Allergies::where('allrgy_id', $allergyId)->exists()) {
                    return response()->json(['error' => 'Allergy not found.'], 404);
                }
                $pa_all = new PatientAllergies;
                $pa_all->pa_ptnt_id = $request->pa_ptnt_id;
                $pa_all->pa_allrgy_id = $allergyId;
                $pa_all->save();
            }

            return response()->json([
                "message" => "Patient Allergies added"
            ], 201);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while trying to add Patient Allergies.'], 500);
        }
    }
}

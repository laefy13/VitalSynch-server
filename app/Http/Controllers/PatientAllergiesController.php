<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientAllergies;
use App\Models\PatientProfile;
use App\Models\Allergies;
use Illuminate\Support\Facades\DB;

class PatientAllergiesController extends Controller
{
    
    public function index(){
        $pat_all = DB::select('SELECT ptnt_surname,ptnt_first_name,ptnt_mid_name,ptnt_extn_name,ptnt_sex,allrgy_name,allrgy_type,allrgy_severity
        FROM tbl_patient_allergies
        LEFT JOIN tbl_allergies ON tbl_patient_allergies.pa_allrgy_id = tbl_allergies.allrgy_id
        LEFT JOIN tbl_patient_profile ON tbl_patient_allergies.pa_ptnt_id = tbl_patient_profile.ptnt_id');
        return response()->json($pat_all);
    }

    public function single($id){
        $row = DB::select('SELECT ptnt_surname,ptnt_first_name,ptnt_mid_name,ptnt_extn_name,ptnt_sex,allrgy_name,allrgy_type,allrgy_severity
        FROM tbl_patient_allergies
        LEFT JOIN tbl_allergies ON tbl_patient_allergies.pa_allrgy_id = tbl_allergies.allrgy_id
        LEFT JOIN tbl_patient_profile ON tbl_patient_allergies.pa_ptnt_id = tbl_patient_profile.ptnt_id
        WHERE tbl_patient_allergies = ?;', [$id]);
        return response()->json($row);
    }

    // public function pk(){
    //     $pat_all = DB::select('SELECT pa_ptnt_id, pa_allrgy_id
    //                             FROM tbl_patient_allergies');
    //     return response()->json($pat_all);
    // }

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

    public function update(Request $request){
        if (!$request->has('pa_ptnt_id') ){
            return response()->json([
                'error' => 'Patient ID not provided'
            ], 400);
        }
        if (!$request->has('pa_allrgy_id') ){
            return response()->json([
                'error' => 'Allergy ID not provided'
            ], 400);
        }

        $pa_all_update = [];

        if ($request->has('pa_ptnt_id')){
            $pa_all_update['pa_ptnt_id'] = $request->pa_ptnt_id;

        }
        if ($request->has('pa_allrgy_id')){
            $pa_all_update['pa_allrgy_id'] = $request->pa_allrgy_id;

        }
        $doesExist = DB::select('SELECT * from tbl_patient_allergies WHERE pa_ptnt_id = ? &
        pa_allrgy_id = ?',[ $pa_all_update['pa_ptnt_id'],$pa_all_update['pa_allrgy_id']]);

        if ($doesExist){
            return response()->json([
                'error' => 'Information already exists'
            ], 409);
        }

        PatientAllergies::where('pa_ptnt_id',$request->pa_ptnt_id)
        ->where('pa_allrgy_id',$request->pa_allrgy_id)
        ->update($pa_all_update);

        return response()->json([
            "message" => "Patient allergies updated"
        ],201);

    }
}

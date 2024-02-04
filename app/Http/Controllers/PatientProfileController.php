<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\DB;

class PatientProfileController extends Controller
{
    //

    public function index(){
        $pat_prof = PatientProfile::all();
        return response()->json($pat_prof);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_patient_profile
                                WHERE ptnt_id = ?',[$id]);
        return response()->json($row);
    }

    public function pk(){
        $pat_prof = DB::select('SELECT ptnt_id, ptnt_surname, ptnt_first_name, ptnt_mid_name, ptnt_extn_name
                                FROM tbl_patient_profile');
        return response()->json($pat_prof);
    }

    public function store(Request $request){
        $pat_prof = new PatientProfile ; 
        $pat_prof->ptnt_grdn_id = $request->ptnt_grdn_id;
        $pat_prof->ptnt_surname = $request->ptnt_surname;
        $pat_prof->ptnt_first_name = $request->ptnt_first_name;
        $pat_prof->ptnt_mid_name = $request->ptnt_mid_name;
        $pat_prof->ptnt_extn_name = $request->ptnt_extn_name;
        $pat_prof->ptnt_sex = $request->ptnt_sex;
        $pat_prof->ptnt_birth_date = $request->ptnt_birth_date;
        $pat_prof->ptnt_blood_group = $request->ptnt_blood_group;
        $pat_prof->ptnt_marital_status = $request->ptnt_marital_status;
        $pat_prof->ptnt_contact_number = $request->ptnt_contact_number;
        $pat_prof->ptnt_address = $request->ptnt_address;


        $pat_prof->save();
        return response()->json([
            "message" => "Patient Profile added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('ptnt_id') ){
            return response()->json([
                'error' => 'Patient ID not provided'
            ], 400);
        }

        $ptnt_update = [];

        if ($request->has('ptnt_surname')){
            $ptnt_update['ptnt_surname'] = $request->ptnt_surname;

        }
        if ($request->has('ptnt_first_name')){
            $ptnt_update['ptnt_first_name'] = $request->ptnt_first_name;

        }
        if ($request->has('ptnt_mid_name')){
            $ptnt_update['ptnt_mid_name'] = $request->ptnt_mid_name;

        }
        if ($request->has('ptnt_extn_name')){
            $ptnt_update['ptnt_extn_name'] = $request->ptnt_extn_name;

        }
        if ($request->has('ptnt_sex')){
            $ptnt_update['ptnt_sex'] = $request->ptnt_sex;

        }
        if ($request->has('ptnt_birth_date')){
            $ptnt_update['ptnt_birth_date'] = $request->ptnt_birth_date;

        }
        if ($request->has('ptnt_blood_group')){
            $ptnt_update['ptnt_blood_group'] = $request->ptnt_blood_group;

        }
        if ($request->has('ptnt_marital_status')){
            $ptnt_update['ptnt_marital_status'] = $request->ptnt_marital_status;

        }
        if ($request->has('ptnt_contact_number')){
            $ptnt_update['ptnt_contact_number'] = $request->ptnt_contact_number;

        }
        if ($request->has('ptnt_address')){
            $ptnt_update['ptnt_address'] = $request->ptnt_address;

        }
        if ($request->has('ptnt_grdn_id')){
            $ptnt_update['ptnt_grdn_id'] = $request->ptnt_grdn_id;

        }

        PatientProfile::where('ptnt_id',$request->ptnt_id)
        ->update($ptnt_update);

        return response()->json([
            "message" => "Patient Profile updated"
        ],201);

    }
}

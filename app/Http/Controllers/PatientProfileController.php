<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientProfileController extends Controller
{
    //

    public function index(){
        $pat_prof = PatientProfile::all();
        $pat_prof->each(function ($profile) {
            if ($profile->ptnt_allergies) {
                $profile->ptnt_allergies = json_decode($profile->ptnt_allergies, true);
            }
        });
        
        return response()->json($pat_prof);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_patient_profile
                                WHERE ptnt_id = ?',[$id]);
         if (!empty($row)) {
            // Decode the 'ptnt_allergies' field if it exists
            if (isset($row[0]->ptnt_allergies)) {
                $row[0]->ptnt_allergies = json_decode($row[0]->ptnt_allergies, true);
            }
    
            return response()->json($row[0]);
        } else {
            // Handle the case where no record is found for the given ID
            return response()->json(['error' => 'Record not found'], 404);
        }
    }

    public function pk(){
        $pat_prof = DB::select('SELECT ptnt_id, ptnt_surname, ptnt_first_name, ptnt_mid_name, ptnt_extn_name
                                FROM tbl_patient_profile');
        return response()->json($pat_prof);
    }

    public function store(Request $request){
        $pat_prof = new PatientProfile ; 
        $pat_prof->ptnt_grdn_id = $request->ptnt_grdn_id;
        $pat_prof->ptnt_doctor_id = $request->ptnt_doctor_id;
        $pat_prof->ptnt_email = $request->ptnt_email;
        $pat_prof->ptnt_password = Hash::make($request->ptnt_password);
        $pat_prof->ptnt_allergies = json_encode($request->ptnt_allergies);
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

        // dd($request->ptnt_password, $pat_prof->ptnt_password);
        $pat_prof->save();
        return response()->json([
            "message" => "Patient Profile added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('ptnt_id')) {
            return response()->json([
                'error' => 'Patient ID not provided'
            ], 400);
        }
    
        $pat_prof = new PatientProfile;
        $allowedAttributes = [
            'ptnt_grdn_id', 'ptnt_doctor_id', 'ptnt_email', 'ptnt_password',
            'ptnt_allergies', 'ptnt_surname', 'ptnt_first_name', 'ptnt_mid_name',
            'ptnt_extn_name', 'ptnt_sex', 'ptnt_birth_date', 'ptnt_blood_group',
            'ptnt_marital_status', 'ptnt_contact_number', 'ptnt_address'
        ];
    
        foreach ($allowedAttributes as $attribute) {
            if ($request->has($attribute)) {
                $pat_prof->$attribute = ($attribute == 'ptnt_password') ? Hash::make($request->$attribute) : $request->$attribute;
            }
        }
        if ($request->has('ptnt_allergies')) {
            $pat_prof->ptnt_allergies = json_encode($request->ptnt_allergies);
        }
    
        $pat_prof->save();
    
        return response()->json([
            "message" => "Patient Profile updated"
        ], 201);

    }
}

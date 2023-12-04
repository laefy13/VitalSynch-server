<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;

class PatientProfileController extends Controller
{
    //

    public function index(){
        $pat_prof = PatientProfile::all();
        return response()->json($pat_prof);
    }
    public function store(Request $request){
        $pat_prof = new PatientProfile ; 
        $pat_prof->ptnt_id = $request->ptnt_id;
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
        $pat_prof->ptnt_addres = $request->ptnt_addres;


        $pat_prof->save();
        return response()->json([
            "message" => "Patient Profile added"
        ],201);

    }
}

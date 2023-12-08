<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuardianProfile;

class GuardianProfileController extends Controller
{
    public function index(){
        $grdn_prof = GuardianProfile::all();
        return response()->json($grdn_prof);
    }
    public function store(Request $request){
        $grdn_prof = new GuardianProfile ; 
        $grdn_prof->grdn_id = $request->grdn_id;
        $grdn_prof->grdn_surname = $request->grdn_surname;
        $grdn_prof->grdn_first_name = $request->grdn_first_name;
        $grdn_prof->grdn_mid_name = $request->grdn_mid_name;
        $grdn_prof->grdn_extn_name = $request->grdn_extn_name;
        $grdn_prof->grdn_sex = $request->grdn_sex;
        $grdn_prof->grdn_birth_date = $request->grdn_birth_date;
        $grdn_prof->grdn_blood_group = $request->grdn_blood_group;
        $grdn_prof->grdn_marital_status = $request->grdn_marital_status;
        $grdn_prof->grdn_contact_number = $request->grdn_contact_number;
        $grdn_prof->grdn_address = $request->grdn_address;


        $grdn_prof->save();
        return response()->json([
            "message" => "Guardian Profile added"
        ],201);
    }
}

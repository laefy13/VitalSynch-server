<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuardianProfile;
use Illuminate\Support\Facades\DB;

class GuardianProfileController extends Controller
{
    public function index(){
        $grdn_prof = GuardianProfile::all();
        return response()->json($grdn_prof);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_grdn_profile
                                WHERE grdn_id = ?',[$id]);
        return response()->json($row);
    }

    public function pk(){
        $grdn_prof = DB::select('SELECT grdn_id, grdn_surname,
                                grdn_first_name, grdn_mid_name, grdn_extn_name 
                                FROM tbl_grdn_profile');
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

    public function update(Request $request){
        if (!$request->has('grdn_id') ){
            return response()->json([
                'error' => 'Guardian ID not provided'
            ], 400);
        }

        $grdn_update = [];

        if ($request->has('grdn_surname')){
            $grdn_update['grdn_surname'] = $request->grdn_surname;

        }
        if ($request->has('grdn_first_name')){
            $grdn_update['grdn_first_name'] = $request->grdn_first_name;

        }
        if ($request->has('grdn_mid_name')){
            $grdn_update['grdn_mid_name'] = $request->grdn_mid_name;

        }
        if ($request->has('grdn_extn_name')){
            $grdn_update['grdn_extn_name'] = $request->grdn_extn_name;

        }
        if ($request->has('grdn_sex')){
            $grdn_update['grdn_sex'] = $request->grdn_sex;

        }
        if ($request->has('grdn_birth_date')){
            $grdn_update['grdn_birth_date'] = $request->grdn_birth_date;

        }
        if ($request->has('grdn_blood_group')){
            $grdn_update['grdn_blood_group'] = $request->grdn_blood_group;

        }
        if ($request->has('grdn_marital_status')){
            $grdn_update['grdn_marital_status'] = $request->grdn_marital_status;

        }
        if ($request->has('grdn_contact_number')){
            $grdn_update['grdn_contact_number'] = $request->grdn_contact_number;

        }
        if ($request->has('grdn_address')){
            $grdn_update['grdn_address'] = $request->grdn_address;

        }

        GuardianProfile::where('grdn_id',$request->grdn_id)
        ->update($grdn_update);

        return response()->json([
            "message" => "Guardian Profile updated"
        ],201);

    }

}

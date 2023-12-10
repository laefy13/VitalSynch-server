<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    //
    public function index(){
        $doc_prof = DoctorProfile::all();
        return response()->json($doc_prof);
    }

    public function pk(){
        $doc_prof = DB::select('SELECT doctor_id, doctor_surname, 
                                doctor_first_name, doctor_mid_name, doctor_extn_name
                                FROM tbl_doctor_profile');
        return response()->json($doc_prof);
    }

    public function store(Request $request){
        // check if request has image if not error
        // or nullable?
        if (!$request->file('doctor_signature')){

            return response()->json(['error' => 'Signature file not provided.'], 400);
        }
        $doc_prof = new DoctorProfile ; 

        $doc_prof->doctor_surname = $request->doctor_surname;
        $doc_prof->doctor_first_name = $request->doctor_first_name;
        $doc_prof->doctor_mid_name = $request->doctor_mid_name;
        $doc_prof->doctor_extn_name = $request->doctor_extn_name ?? null;
        $doc_prof->doctor_sex = $request->doctor_sex;
        $doc_prof->doctor_contact_number = $request->doctor_contact_number;
        $doc_prof->doctor_address = $request->doctor_address;
        
        $doc_prof->doctor_signature = $this->urlGenerate($request);


        $doc_prof->save();
        return response()->json([
            "message" => "Doctor Profile added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('doctor_id') ){
            return response()->json([
                'error' => 'Doctor ID not provided'
            ], 400);
        }

        $doctor_update = [];

        if ($request->has('doctor_surname')){
            $doctor_update['doctor_surname'] = $request->doctor_surname;

        }
        if ($request->has('doctor_first_name')){
            $doctor_update['doctor_first_name'] = $request->doctor_first_name;

        }
        if ($request->has('doctor_mid_name')){
            $doctor_update['doctor_mid_name'] = $request->doctor_mid_name;

        }
        if ($request->has('doctor_extn_name')){
            $doctor_update['doctor_extn_name'] = $request->doctor_extn_name;

        }
        if ($request->has('doctor_sex')){
            $doctor_update['doctor_sex'] = $request->doctor_sex;

        }
        if ($request->has('doctor_contact_number')){
            $doctor_update['doctor_contact_number'] = $request->doctor_contact_number;

        }
        if ($request->has('doctor_address')){
            $doctor_update['doctor_address'] = $request->doctor_address;

        }
        if ($request->has('doctor_signature')){
            $doctor_update['doctor_signature'] = $this->urlGenerate($request);

        }

        DoctorProfile::where('doctor_id',$request->doctor_id)
        ->update($doctor_update);

        return response()->json([
            "message" => "Doctor Profile updated"
        ],201);

    }

    private function urlGenerate($filee){
        // dd($filee);
        $path = $filee->file('doctor_signature')->store('Signatures');
        return Storage::url($path);
    }
}

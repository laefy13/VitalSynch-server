<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Storage;

class DoctorProfileController extends Controller
{
    //
    public function index(){
        $doc_prof = DoctorProfile::all();
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
        
        $path = $request->file('doctor_signature')->store('Signatures');
        // dd($path);
        $doc_prof->doctor_signature = Storage::url($path);


        $doc_prof->save();
        return response()->json([
            "message" => "Doctor Profile added"
        ],201);

    }
}

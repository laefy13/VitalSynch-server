<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Hash;

class DoctorProfileController extends Controller
{
    //
    public function index(){
        $doc_prof = DoctorProfile::all();
        return response()->json($doc_prof);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_doctor_profile
                                WHERE doctor_id = ?',[$id]);
        return response()->json($row);
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
        $doc_prof = new DoctorProfile ; 
        $doc_prof->doctor_id = $request->doctor_id;
        $doc_prof->doctor_surname = $request->doctor_surname;
        $doc_prof->doctor_first_name = $request->doctor_first_name;
        $doc_prof->doctor_mid_name = $request->doctor_mid_name;
        $doc_prof->doctor_extn_name = $request->doctor_extn_name ?? null;
        $doc_prof->doctor_sex = $request->doctor_sex;
        $doc_prof->doctor_email = $request->doctor_email;
        $doc_prof->doctor_password = Hash::make($request->doctor_password);
        $doc_prof->doctor_contact_number = $request->doctor_contact_number;
        $doc_prof->doctor_address = $request->doctor_address;
        $doc_prof->doctor_position = $request->doctor_position;
        $doc_prof->doctor_department = $request->doctor_department;
        
        if ($request->file('doctor_signature')){

            $doc_prof->doctor_signature = $this->cloudinaryURLGenerate($request);
        }

        // dd($doc_prof->doctor_signature);
        $doc_prof->save();
        return response()->json([
            "message" => "Doctor Profile added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('doctor_id')) {
            return response()->json([
                'error' => 'Doctor ID not provided'
            ], 400);
        }
    
        $doctor_update = [];
    
        $nullableFields = ['doctor_extn_name', 'doctor_signature'];
    
        foreach ($nullableFields as $field) {
            if ($request->has($field)) {
                $doctor_update[$field] = $field == 'doctor_signature' ? $this->cloudinaryURLGenerate($request) : $request->$field;
            }
        }
    
        $requiredFields = ['doctor_surname', 'doctor_first_name', 'doctor_mid_name', 'doctor_sex', 'doctor_contact_number', 'doctor_address'];
    
        foreach ($requiredFields as $field) {
            if ($request->has($field)) {
                $doctor_update[$field] = $request->$field;
            }
        }
    
        DoctorProfile::where('doctor_id', $request->doctor_id)
            ->update($doctor_update);
    
        return response()->json([
            "message" => "Doctor Profile updated"
        ], 201);
    }

    private function urlGenerate($filee){
        // dd($filee);
        $path = $filee->file('doctor_signature')->store('public/Signatures');
        return Storage::url($path);
    }
    private function cloudinaryURLGenerate($filee){

        Cloudinary::uploadApi();
        return $filee->file('doctor_signature')->storeOnCloudinary('signatures')->getSecurePath();
    }
}

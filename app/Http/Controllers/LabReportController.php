<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabReport;
use App\Models\LabReportF;
use Illuminate\Support\Facades\DB;
use PDF;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Illuminate\Support\Facades\Storage;
class LabReportController extends Controller
{
    
    public function index(){
        $lab_rep = LabReport::all();
        return response()->json($lab_rep);
    }

    public function single($id){
        $row = DB::select('SELECT * 
                                FROM tbl_lab_report
                                WHERE labrep_id = ?',[$id]);
        return response()->json($row);
    }

    public function pk(){
        $lab_rep = DB::select('SELECT labrep_id
                                FROM tbl_lab_report');
        return response()->json($lab_rep);
    }

    public function store(Request $request){
        $lab_rep = new LabReport ; 
        $lab_rep->labrep_ptnt_id = $request->labrep_ptnt_id;
        $lab_rep->labrep_test_date = $request->labrep_test_date;
        $lab_rep->labrep_test_time = $request->labrep_test_time;
        $lab_rep->labrep_result = $request->labrep_result;
        $lab_rep->labrep_type = $request->labrep_type;


        $lab_rep->save();
        return response()->json([
            "message" => "Lab Report added"
        ],201);

    }


    public function update(Request $request){
        if (!$request->has('labrep_id') ){
            return response()->json([
                'error' => 'Lab Report ID not provided'
            ], 400);
        }

        $labrep_update = [];

        if ($request->has('labrep_ptnt_id')){
            $labrep_update['labrep_ptnt_id'] = $request->labrep_ptnt_id;

        }
        if ($request->has('labrep_test_date')){
            $labrep_update['labrep_test_date'] = $request->labrep_test_date;

        }
        if ($request->has('labrep_test_time')){
            $labrep_update['labrep_test_time'] = $request->labrep_test_time;

        }
        if ($request->has('labrep_result')){
            $labrep_update['labrep_result'] = $request->labrep_result;

        }
        if ($request->has('labrep_type')){
            $labrep_update['labrep_type'] = $request->labrep_type;

        }

        LabReport::where('labrep_id',$request->labrep_id)
        ->update($labrep_update);

        return response()->json([
            "message" => "Lab Report updated"
        ],201);

    }

    public function viewPDF(Request $request){
        $lab_rep = LabReport::where('labrep_id',$request->labrep_id)->first();
        $patient = DB::select('SELECT ptnt_surname, ptnt_first_name,ptnt_mid_name,ptnt_extn_name, ptnt_sex, ptnt_blood_group
                                FROM tbl_patient_profile WHERE ptnt_id = ?', [$lab_rep->labrep_ptnt_id]);
        
        $pdf = PDF::loadView('pdf.lab_rep',['patient' => $patient[0], 'lab_rep' => $lab_rep]);
        return $pdf->stream();
    }
    public function upload($id,Request $request)
    {
        $images = $request->all();
        $paths = [];
        foreach ($images as $image) {
            $extension = $image->getClientOriginalName();
            
            $link =   $this->cloudinaryURLGenerateFile($image);
            $lf = new LabReportF;
            $lf->lf_link = $link;
            $lf->lf_ptnt_id = $id;
            $paths[]=$link;
            $lf->save();
        }
        
        return response()->json([
            "message" => "Lab Report Images added"
        ],201);
    }
    private function cloudinaryURLGenerateFile($filee) 
    {
        Cloudinary::uploadApi();
        return $filee->storeOnCloudinary()->getSecurePath();
    }

    public function files_index(){
        $lf = DB::select('SELECT * FROM tbl_labrep_files');
        return response()->json($lf);
    }

}

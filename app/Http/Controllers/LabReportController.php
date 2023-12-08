<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabReport;

class LabReportController extends Controller
{
   
    public function index(){
        $lab_rep = LabReport::all();
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
}

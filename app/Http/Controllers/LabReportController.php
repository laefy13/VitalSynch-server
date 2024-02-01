<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabReport;
use Illuminate\Support\Facades\DB;

class LabReportController extends Controller
{
   
    public function index(){
        $lab_rep = LabReport::all();
        return response()->json($lab_rep);
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

}

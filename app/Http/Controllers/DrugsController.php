<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugs;
use Illuminate\Support\Facades\DB;

class DrugsController extends Controller
{
    //

    public function index(){
        $drug = Drugs::all();
        return response()->json($drug);
    }

    public function pk(){
        $drug = DB::select('SELECT drug_id, drug_name 
                                FROM tbl_drugs');
        return response()->json($drug);
    }

    public function store(Request $request){
        $drug = new Drugs; 
        $drug->drug_name = $request->drug_name;
        $drug->drug_description = $request->drug_description;


        $drug->save();
        return response()->json([
            "message" => "Drug added"
        ],201);

    }

    public function update(Request $request){
        if (!$request->has('drug_id') ){
            return response()->json([
                'error' => 'Drug ID not provided'
            ], 400);
        }

        $drug_update = [];

        if ($request->has('drug_name')){
            $drug_update['drug_name'] = $request->drug_name;

        }
        if ($request->has('drug_description')){
            $drug_update['drug_description'] = $request->drug_description;

        }

        Drugs::where('drug_id',$request->drug_id)
        ->update($drug_update);

        return response()->json([
            "message" => "Drug updated"
        ],201);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugs;

class DrugsController extends Controller
{
    //

    public function index(){
        $drug = Drugs::all();
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

}

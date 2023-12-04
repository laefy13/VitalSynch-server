<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
class AppFormController extends Controller
{
    //

    public function index(){
        $app_form = ApplicationForm::all();
        return response()->json($app_form);
    }
    public function store(Request $request){
        $app_form = new ApplicationForm ; 
        $app_form->app_full_name = $request->app_full_name;
        $app_form->app_department = $request->app_department;
        $app_form->app_service = $request->app_service;
        $app_form->app_email = $request->app_email;

        $app_form->save();
        return response()->json([
            "message" => "Application Form added"
        ],201);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcessedForms;
use App\Models\ApplicationForm;

class ProcessedFormsController extends Controller
{
    
    public function index(){
        $proc_form = ProcessedForms::all();
        return response()->json($proc_form);
    }
    public function store(Request $request){

        try {
            // dd($request->form_app_queue_num);
            $app_form = ApplicationForm::where('app_queue_num',$request->form_app_queue_num)->firstOrFail();
            $app_form->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Application Form not found.'], 404);
        } 
        // catch (\Exception $e) {

        //     dd(ApplicationForm::where('app_queue_num',$request->form_app_queue_num)->firstOrFail());
        //     return response()->json(['error' => 'An error occurred while deleting the ApplicationForm.'], 500);
        // }

        $proc_form = new ProcessedForms ; 
        $proc_form->form_app_queue_num = $request->form_app_queue_num;
        $proc_form->form_appointment_date = $request->form_appointment_date;
        $proc_form->form_appointment_time = $request->form_appointment_time;
        $proc_form->form_reason = $request->form_reason;
        $proc_form->form_isaccepted = $request->form_isaccepted;

        $proc_form->save();
        
        return response()->json([
            "message" => "Application Form remove and added to Processed Forms"
        ],201);

    }
}

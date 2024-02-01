<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcessedForms;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\DB;

class ProcessedFormsController extends Controller
{
    
    public function index(){
        $proc_form = ProcessedForms::all();
        return response()->json($proc_form);
    }

    public function pk(){
        $proc_form = DB::select('SELECT form_id 
                                FROM tbl_processed_forms');
        return response()->json($proc_form);
    }

    public function store(Request $request){

        try {
            // dd($request->form_app_queue_num);
            $proc_form = ApplicationForm::where('app_queue_num',$request->form_app_queue_num)->firstOrFail();
            $proc_form->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Application Form not found.'], 404);
        } 
        // catch (\Exception $e) {

        //     dd(ApplicationForm::where('form_id',$request->form_app_queue_num)->firstOrFail());
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
    public function update(Request $request){
        if (!$request->has('form_id') ){
            return response()->json([
                'error' => 'Processed Form ID not provided'
            ], 400);
        }

        $form_update = [];

        if ($request->has('form_app_queue_num')){
            $form_update['form_app_queue_num'] = $request->form_app_queue_num;
        }
        if ($request->has('form_appointment_date')){
            $form_update['form_appointment_date'] = $request->form_appointment_date;
        }

        if ($request->has('form_appointment_time')){
            $form_update['form_appointment_time'] = $request->form_appointment_time;
        }

        if ($request->has('form_reason')){
            $form_update['form_reason'] = $request->form_reason;
        }

        if ($request->has('form_isaccepted')){
            $form_update['form_isaccepted'] = $request->form_isaccepted;
        }



        ProcessedForms::where('form_id',$request->form_id)
        ->update($form_update);

        return response()->json([
            "message" => "Processed Form updated"
        ],201);

    }


}

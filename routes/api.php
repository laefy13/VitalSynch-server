<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppFormController;
use App\Http\Controllers\UserAccounsController;
use App\Http\Controllers\PatientProfileController;

use App\Http\Controllers\ProcessedFormsController;
use App\Http\Controllers\AllergiesController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PatientAllergiesController;

use App\Http\Controllers\LabReportController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\GuardianProfileController;


use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionDrugsController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\DoctorProfileController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user_acc',[UserAccounsController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/ptnt_prof',[PatientProfileController::class, 'store']);
Route::post('/doctor_prof',[DoctorProfileController::class, 'store']);
Route::middleware(['auth:sanctum'])->group(function () {
        // routes for admins, nurses, doctors
    Route::middleware(['auth:doctor'])->group(function () {
        // API Routes for application forms
        Route::get('/app_forms',[AppFormController::class, 'index']);
        Route::get('/pkApp_forms',[AppFormController::class, 'pk']);
        // API RouteS for user accounts
        // NAHH
        Route::get('/user_accs',[UserAccounsController::class, 'index']);
        Route::get('/pkUser_acc',[UserAccounsController::class, 'pk']);
        Route::put('/updateUser_acc',[UserAccounsController::class, 'update']);
        // API RouteS for patient profile
        Route::get('/ptnt_profs',[PatientProfileController::class, 'index']);
        Route::get('/pkPtnt_prof',[PatientProfileController::class, 'pk']);
        // API RouteS for processed forms profile
        // Route::get('/procd_forms',[ProcessedFormsController::class, 'index']);
        Route::get('/procd_forms',[ProcessedFormsController::class, 'index']);
        Route::post('/procd_form',[ProcessedFormsController::class, 'store']);
        Route::get('/pkProcd_form',[ProcessedFormsController::class, 'pk']);
        Route::put('/updateProcd_form',[ProcessedFormsController::class, 'update']);
        // API RouteS for Allergies
        Route::get('/allergies',[AllergiesController::class, 'index']);
        Route::get('/pkAllergies',[AllergiesController::class, 'pk']);
        Route::post('/allergies',[AllergiesController::class, 'store']);
        Route::put('/updateAllergies',[AllergiesController::class, 'update']);
        // API RouteS for Logs
        Route::get('/logs',[LogsController::class, 'index']);
        Route::get('/logs/{id}',[LogsController::class, 'single']);
        Route::post('/logs',[LogsController::class, 'store']);
        Route::get('/pkLogs',[LogsController::class, 'pk']);
        Route::put('/updateLogs',[LogsController::class, 'update']);
        // API RouteS for Patient Allergies
        Route::get('/pat_allergies',[PatientAllergiesController::class, 'index']);
        Route::post('/pat_allergies',[PatientAllergiesController::class, 'store']);
        Route::put('/updatePat_allergies',[PatientAllergiesController::class, 'update']);
        // API Routest for Lab Report
        Route::get('/lab_reps',[LabReportController::class, 'index']);
        Route::post('/lab_rep',[LabReportController::class, 'store']);
        Route::get('/pkLab_rep',[LabReportController::class, 'pk']);
        Route::put('/updateLab_rep',[LabReportController::class, 'update']);
        // API Routest for Medical History
        Route::get('/med_hiss',[MedicalHistoryController::class, 'index']);
        Route::post('/med_his',[MedicalHistoryController::class, 'store']);
        Route::get('/pkMed_his',[MedicalHistoryController::class, 'pk']);
        Route::put('/updateMed_his',[MedicalHistoryController::class, 'update']);
        // API Routest for Guardian Profile
        Route::get('/grdn_profs',[GuardianProfileController::class, 'index']);
        Route::post('/grdn_prof',[GuardianProfileController::class, 'store']);
        Route::get('/pkGrdn_prof',[GuardianProfileController::class, 'pk']);
        // API Routest for Prescription
        Route::get('/prescrs',[PrescriptionController::class, 'index']);
        Route::post('/prescr',[PrescriptionController::class, 'store']);
        Route::get('/pkPrescr',[PrescriptionController::class, 'pk']);
        Route::put('/updatePrescr',[PrescriptionController::class, 'update']);
        // API Routest for Prescription Drugs
        Route::post('/pd',[PrescriptionDrugsController::class, 'store']);
        Route::get('/pds',[PrescriptionDrugsController::class, 'index']);
        Route::get('/pkPd',[PrescriptionDrugsController::class, 'pk']);
        Route::put('/updatePd',[PrescriptionDrugsController::class, 'update']);
        // API Routest for Drugs
        Route::get('/drugs',[DrugsController::class, 'index']);
        Route::post('/drugs',[DrugsController::class, 'store']);
        Route::get('/pkDrugs',[DrugsController::class, 'pk']);
        Route::put('/updateDrugs',[DrugsController::class, 'update']);
        // API RouteS for doctor profile
        Route::get('/doctor_profs',[DoctorProfileController::class, 'index']);
        Route::get('/pkDoctor_prof',[DoctorProfileController::class, 'pk']);
        Route::put('/updateDoctor_prof',[DoctorProfileController::class, 'update']);

    });
        // uncomment for Routes for users/guardians
        // Route::middleware(['user-type:1','user-type:0'])->group(function () {
        // });
        // Routes for all
    Route::group([],function () {
        // singles
        Route::get('/allergy/{id}',[AllergiesController::class, 'single']);
        Route::get('/user_acc/{id}',[UserAccounsController::class, 'single']);
        Route::get('/app_form/{id}',[AppFormController::class, 'single']);
        Route::get('/doctor_prof/{id}',[DoctorProfileController::class, 'single']);
        Route::get('/drug/{id}',[DrugsController::class, 'single']);
        Route::get('/grdn_prof/{id}',[GuardianProfileController::class, 'single']);
        Route::get('/lab_rep/{id}',[LabReportController::class, 'single']);
        Route::get('/med_his/{id}',[MedicalHistoryController::class, 'single']);
        Route::get('/pat_allergy/{id}',[PatientAllergiesController::class, 'single']);
        Route::get('/ptnt_prof/{id}',[PatientProfileController::class, 'single']);
        Route::get('/prescr/{id}',[PrescriptionController::class, 'single']);
        
        Route::post('/app_form',[AppFormController::class, 'store']);
        Route::put('/updateApp_forms',[AppFormController::class, 'update']);

        Route::post('/prescr/prescrViewPDF', [PrescriptionController::class, 'viewPDF']);

        Route::put('/updateGrdn_prof',[GuardianProfileController::class, 'update']);

        Route::post('/lab_rep/prescrViewPDF', [LabReportController::class, 'viewPDF']);

        Route::put('/updatePtnt_prof',[PatientProfileController::class, 'update']);

    });
});




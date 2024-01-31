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

Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware(['auth:sanctum'])->group(function () {
});


    // API Routes for application forms
    Route::get('/app_forms',[AppFormController::class, 'index']);
    Route::post('/app_forms',[AppFormController::class, 'store']);
    Route::get('/pkApp_forms',[AppFormController::class, 'pk']);
    Route::put('/updateApp_forms',[AppFormController::class, 'update']);
    //API Route for login
    // API RouteS for user accounts
    // NAHH
    Route::get('/user_acc',[UserAccounsController::class, 'index']);
    Route::post('/user_acc',[UserAccounsController::class, 'store']);
    Route::get('/pkUser_acc',[AppFormController::class, 'pk']);
    Route::put('/updateUser_acc',[AppFormController::class, 'update']);
    // API RouteS for patient profile
    Route::get('/ptnt_prof',[PatientProfileController::class, 'index']);
    Route::post('/ptnt_prof',[PatientProfileController::class, 'store']);
    Route::get('/pkPtnt_prof',[AppFormController::class, 'pk']);
    Route::put('/updatePtnt_prof',[AppFormController::class, 'update']);
    // API RouteS for processed forms profile
    Route::get('/procd_form',[ProcessedFormsController::class, 'index']);
    Route::post('/procd_form',[ProcessedFormsController::class, 'store']);
    Route::get('/pkProcd_form',[AppFormController::class, 'pk']);
    Route::put('/updateProcd_form',[AppFormController::class, 'update']);
    // API RouteS for Allergies
    Route::get('/allergies',[AllergiesController::class, 'index']);
    Route::get('/pkAllergies',[AllergiesController::class, 'pk']);
    Route::post('/allergies',[AllergiesController::class, 'store']);
    Route::put('/updateAllergies',[AllergiesController::class, 'update']);
    // API RouteS for Logs
    Route::get('/logs',[LogsController::class, 'index']);
    Route::post('/logs',[LogsController::class, 'store']);
    Route::get('/pkLogs',[LogsController::class, 'pk']);
    Route::put('/updateLogs',[LogsController::class, 'update']);
    // API RouteS for Patient Allergies
    Route::get('/pat_allergies',[PatientAllergiesController::class, 'index']);
    Route::post('/pat_allergies',[PatientAllergiesController::class, 'store']);
    Route::put('/updatePat_allergies',[AppFormController::class, 'update']);
    // API Routest for Lab Report
    Route::get('/lab_rep',[LabReportController::class, 'index']);
    Route::post('/lab_rep',[LabReportController::class, 'store']);
    Route::get('/pkLab_rep',[LabReportController::class, 'pk']);
    Route::put('/updateLab_rep',[LabReportController::class, 'update']);
    // API Routest for Medical History
    Route::get('/med_his',[MedicalHistoryController::class, 'index']);
    Route::post('/med_his',[MedicalHistoryController::class, 'store']);
    Route::get('/pkMed_his',[AppFormController::class, 'pk']);
    Route::put('/updateMed_his',[AppFormController::class, 'update']);
    // API Routest for Guardian Profile
    Route::get('/grdn_prof',[GuardianProfileController::class, 'index']);
    Route::post('/grdn_prof',[GuardianProfileController::class, 'store']);
    Route::get('/pkGrdn_prof',[GuardianProfileController::class, 'pk']);
    Route::put('/updateGrdn_prof',[GuardianProfileController::class, 'update']);
    // API Routest for Prescription
    Route::get('/prescr',[PrescriptionController::class, 'index']);
    Route::post('/prescr',[PrescriptionController::class, 'store']);
    Route::get('/pkPrescr',[AppFormController::class, 'pk']);
    Route::put('/updatePrescr',[AppFormController::class, 'update']);
    Route::post('/prescrViewPDF', [PrescriptionController::class, 'viewPDF']);
    // API Routest for Prescription Drugs
    Route::get('/pd',[PrescriptionDrugsController::class, 'index']);
    Route::post('/pd',[PrescriptionDrugsController::class, 'store']);
    Route::get('/pkPd',[AppFormController::class, 'pk']);
    Route::put('/updatePd',[AppFormController::class, 'update']);
    // API Routest for Drugs
    Route::get('/drugs',[DrugsController::class, 'index']);
    Route::post('/drugs',[DrugsController::class, 'store']);
    Route::get('/pkDrugs',[DrugsController::class, 'pk']);
    Route::put('/updateDrugs',[DrugsController::class, 'update']);
    // API RouteS for doctor profile
    Route::get('/doctor_prof',[DoctorProfileController::class, 'index']);
    Route::post('/doctor_prof',[DoctorProfileController::class, 'store']);
    Route::get('/pkDoctor_prof',[DoctorProfileController::class, 'pk']);
    Route::put('/updateDoctor_prof',[DoctorProfileController::class, 'update']);


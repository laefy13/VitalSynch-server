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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// API Routes for application forms
Route::get('/app_forms',[AppFormController::class, 'index']);
Route::post('/app_forms',[AppFormController::class, 'store']);
// API RouteS for user accounts
// NAHH
Route::get('/user_acc',[UserAccounsController::class, 'index']);
Route::post('/user_acc',[UserAccounsController::class, 'store']);
// API RouteS for patient profile
Route::get('/ptnt_prof',[PatientProfileController::class, 'index']);
Route::post('/ptnt_prof',[PatientProfileController::class, 'store']);
// API RouteS for processed forms profile
Route::get('/procd_form',[ProcessedFormsController::class, 'index']);
Route::post('/procd_form',[ProcessedFormsController::class, 'store']);
// API RouteS for Allergies
Route::get('/allergies',[AllergiesController::class, 'index']);
Route::post('/allergies',[AllergiesController::class, 'store']);
// API RouteS for Logs
Route::get('/logs',[LogsController::class, 'index']);
Route::post('/logs',[LogsController::class, 'store']);
// API RouteS for Patient Allergies
Route::get('/pat_allergies',[PatientAllergiesController::class, 'index']);
Route::post('/pat_allergies',[PatientAllergiesController::class, 'store']);
// API Routest for Lab Report
Route::get('/lab_rep',[LabReportController::class, 'index']);
Route::post('/lab_rep',[LabReportController::class, 'store']);
// API Routest for Medical History
Route::get('/med_his',[MedicalHistoryController::class, 'index']);
Route::post('/med_his',[MedicalHistoryController::class, 'store']);
// API Routest for Guardian Profile
Route::get('/grdn_prof',[GuardianProfileController::class, 'index']);
Route::post('/grdn_prof',[GuardianProfileController::class, 'store']);
// API Routest for Prescription
Route::get('/prescr',[PrescriptionController::class, 'index']);
Route::post('/prescr',[PrescriptionController::class, 'store']);
// API Routest for Prescription Drugs
Route::get('/pd',[PrescriptionDrugsController::class, 'index']);
Route::post('/pd',[PrescriptionDrugsController::class, 'store']);
// API Routest for Drugs
Route::get('/drugs',[DrugsController::class, 'index']);
Route::post('/drugs',[DrugsController::class, 'store']);
// API RouteS for doctor profile
Route::get('/doctor_prof',[DoctorProfileController::class, 'index']);
Route::post('/doctor_prof',[DoctorProfileController::class, 'store']);


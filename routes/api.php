<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppFormController;
use App\Http\Controllers\UserAccountsController;
use App\Http\Controllers\PatientProfileController;

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
# API Route for application forms
Route::get('/app_forms',[AppFormController::class, 'index']);
Route::post('/app_forms',[AppFormController::class, 'store']);
# API Route for user accounts
Route::get('/user_acc',[UserAccountsController::class, 'index']);
Route::post('/user_acc',[UserAccountsController::class, 'store']);
# API Route for patient profile
Route::get('/ptnt_prof',[PatientProfileController::class, 'index']);
Route::post('/ptnt_prof',[PatientProfileController::class, 'store']);


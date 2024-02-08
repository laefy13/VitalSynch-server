<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ApplicationForm;
use App\Models\UserAccounts;
use App\Models\PatientProfile;
use App\Models\ProcessedForms;
use App\Models\Logs;
use App\Models\PatientAllergies;
use App\Models\Allergies;
use App\Models\LabReport;
use App\Models\MedicalHistory;
use App\Models\GuardianProfile;
use App\Models\Prescription;
use App\Models\PrescriptionDrugs;
use App\Models\Drugs;
use App\Models\DoctorProfile;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory(10)->create();
        ApplicationForm::factory(10)->create();
        UserAccounts::factory(10)->create();
        PatientProfile::factory(10)->create();
        ProcessedForms::factory(10)->create();
        Logs::factory(10)->create();
        Allergies::factory(10)->create();
        GuardianProfile::factory(10)->create();
        DoctorProfile::factory(10)->create();
        Drugs::factory(10)->create();
        LabReport::factory(10)->create();
        Prescription::factory(10)->create();
        PrescriptionDrugs::factory(10)->create();
        MedicalHistory::factory(10)->create();
        PatientAllergies::factory(10)->create();
    }
}

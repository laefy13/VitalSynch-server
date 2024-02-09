<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_patient_profile', function (Blueprint $table) {
            $table->increments('ptnt_key');
            $table->string('ptnt_id')->unique();
            $table->integer('ptnt_grdn_id')->nullable();
            $table->string('ptnt_email')->unique();
            $table->string('ptnt_password');
            $table->string('ptnt_surname');
            $table->string('ptnt_first_name');
            $table->string('ptnt_mid_name')->nullable();
            $table->string('ptnt_extn_name')->nullable();
            $table->json('ptnt_allergies')->nullable();
            $table->string('ptnt_sex');
            $table->date('ptnt_birth_date');
            $table->string('ptnt_blood_group')->nullable();
            $table->string('ptnt_marital_status')->nullable();
            $table->string('ptnt_contact_number');
            $table->string('ptnt_address');
        });
        DB::table('tbl_patient_profile')->insert([
            'ptnt_id' => 'PTNT-askdbak1213',
            'ptnt_grdn_id' => null,
            'ptnt_email' => 'as@gmail.com',
            'ptnt_password' => Hash::make('Karlos13'),
            'ptnt_surname' => 'Surname',
            'ptnt_first_name' => 'FirstName',
            'ptnt_mid_name' => null,
            'ptnt_extn_name' => null,
            'ptnt_allergies' => json_encode(['Default_Allergy']),
            'ptnt_sex' => 'Male',
            'ptnt_birth_date' => now(),
            'ptnt_blood_group' => null,
            'ptnt_marital_status' => null,
            'ptnt_contact_number' => '1234567890',
            'ptnt_address' => 'Default_Address',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_patient_profile');
    }
};

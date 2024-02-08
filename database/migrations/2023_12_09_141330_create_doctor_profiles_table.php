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
        Schema::create('tbl_doctor_profile', function (Blueprint $table) {
            
            $table->increments('doctor_key');
            $table->string('doctor_id');
            $table->string('doctor_surname');
            $table->string('doctor_first_name');
            $table->string('doctor_mid_name')->nullable();
            $table->string('doctor_extn_name')->nullable();
            $table->string('doctor_email')->unique();
            $table->string('doctor_password');
            $table->string('doctor_sex');
            $table->string('doctor_contact_number');
            $table->string('doctor_address');
            $table->string('doctor_position')->nullable();
            $table->string('doctor_department')->nullable();
            $table->string('doctor_signature')->nullable();
        });

        DB::table('tbl_doctor_profile')->insert([
            'doctor_id' => 'DOC-askdbak1213',
            'doctor_surname' => 'Default_Doctor_Surname',
            'doctor_first_name' => 'Default_Doctor_FirstName',
            'doctor_mid_name' => null,
            'doctor_extn_name' => null,
            'doctor_email' => 'd@gmail.com',
            'doctor_password' => Hash::make('Karlos13'),
            'doctor_sex' => 'Male',
            'doctor_contact_number' => '9876543210',
            'doctor_address' => 'Default_Doctor_Address',
            'doctor_position' => 'Default_Position',
            'doctor_department' => 'Default_Department',
            'doctor_signature' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_doctor_profile');
    }
};

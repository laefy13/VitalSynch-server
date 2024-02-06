<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_patient_profile', function (Blueprint $table) {
            $table->increments('ptnt_id');
            $table->integer('ptnt_grdn_id')->nullable();
            $table->integer('ptnt_doctor_id');
            $table->integer('ptnt_user_id');
            $table->string('ptnt_surname');
            $table->string('ptnt_first_name');
            $table->string('ptnt_mid_name');
            $table->string('ptnt_extn_name')->nullable();
            $table->json('ptnt_allergies')->nullable();
            $table->string('ptnt_sex');
            $table->date('ptnt_birth_date');
            $table->string('ptnt_blood_group');
            $table->string('ptnt_marital_status');
            $table->string('ptnt_contact_number');
            $table->string('ptnt_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_patient_profile');
    }
};

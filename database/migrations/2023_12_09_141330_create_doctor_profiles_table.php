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
        Schema::create('tbl_doctor_profile', function (Blueprint $table) {
            
            $table->increments('doctor_id');
            $table->string('doctor_surname');
            $table->string('doctor_first_name');
            $table->string('doctor_mid_name');
            $table->string('doctor_extn_name')->nullable();
            $table->string('doctor_sex');
            $table->string('doctor_contact_number');
            $table->string('doctor_address');
            $table->string('doctor_signature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_doctor_profile');
    }
};

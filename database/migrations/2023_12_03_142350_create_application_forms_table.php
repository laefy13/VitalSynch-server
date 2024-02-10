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
        Schema::create('tbl_app_form', function (Blueprint $table) {
            $table->increments('app_queue_num');
            $table->string('app_full_name');
            $table->string('app_department');
            $table->string('app_service');
            $table->string('app_doctor_name');
            $table->date('app_date');
            $table->time('app_time');
            $table->date('app_birth_date');
            $table->text('app_address');
            $table->string('app_contact_num');
            $table->string('app_sex');
            $table->text('app_symptoms')->nullable();
            $table->integer('app_is_accepted')->nullable()->default(0);
            $table->string('app_reason')->nullable();
            $table->string('app_patient_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_app_form');
    }
};

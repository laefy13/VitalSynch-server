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
            $table->string('app_email');
            $table->integer('app_patient_id');
            $table->integer('app_doctor_id');
            $table->date('app_date');
            $table->time('app_time');
            $table->integer('app_is_accepted')->default(0);
            $table->string('app_reason')->nullable();
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

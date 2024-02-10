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
        Schema::create('tbl_processed_forms', function (Blueprint $table) {
            
            $table->increments('form_id');
            $table->integer('form_app_queue_num');
            $table->date('form_appointment_date');
            $table->time('form_appointment_time');
            $table->string('form_reason');
            $table->boolean('form_isaccepted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_processed_forms');
    }
};

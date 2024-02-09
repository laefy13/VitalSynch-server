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
        Schema::create('tbl_prescription', function (Blueprint $table) {
            $table->increments('prescr_id');
            $table->string('prescr_ptnt_id');
            $table->string('prescr_doctor_id');
            $table->date('prescr_date');
            $table->time('prescr_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_prescription');
    }
};

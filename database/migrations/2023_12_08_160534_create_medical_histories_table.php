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
        Schema::create('tbl_med_history', function (Blueprint $table) {
            $table->increments('medhis_id');
            $table->string('medhis_ptnt_id');
            $table->date('medhis_record_date');
            $table->time('medhis_record_time');
            $table->float('medhis_height');
            $table->float('medhis_weight');
            $table->float('medhis_blood_pressure');
            $table->float('medhis_glucose');
            $table->string('medhis_illness');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_med_history');
    }
};

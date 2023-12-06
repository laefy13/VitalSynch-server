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
        Schema::create('tbl_patient_allergies', function (Blueprint $table) {
            $table->integer('pa_ptnt_id');
            $table->integer('pa_allrgy_id');
            $table->index(['pa_ptnt_id', 'pa_allrgy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_patient_allergies');
    }
};

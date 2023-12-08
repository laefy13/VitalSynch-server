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
        Schema::create('tbl_lab_report', function (Blueprint $table) {
            $table->increments('labrep_id');
            $table->integer('labrep_ptnt_id');
            $table->date('labrep_test_date');
            $table->time('labrep_test_time');
            $table->string('labrep_result');
            $table->string('labrep_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lab_report');
    }
};

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

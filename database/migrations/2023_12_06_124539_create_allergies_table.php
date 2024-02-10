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
        Schema::create('tbl_allergies', function (Blueprint $table) {
            $table->increments('allrgy_id');
            $table->string('allrgy_name');
            $table->string('allrgy_type');
            $table->string('allrgy_severity');
            $table->string('allrgy_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_allergies');
    }
};

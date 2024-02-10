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
        
        Schema::create('tbl_prescription_files', function (Blueprint $table) {
            
            $table->increments('pf_id');
            $table->string('pf_link');
            $table->string('pf_ptnt_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('tbl_prescription_files');
        }
    }
};

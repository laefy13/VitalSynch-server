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
        
        Schema::create('tbl_labrep_files', function (Blueprint $table) {
            
            $table->increments('lf_id');
            $table->string('lf_link');
            $table->string('lf_ptnt_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('tbl_labrep_files');
        }
    }
};

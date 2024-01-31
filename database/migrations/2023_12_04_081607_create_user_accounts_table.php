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
        Schema::create('tbl_user_accounts', function (Blueprint $table) {
            $table->string('usr_email')->primary();
            $table->string('usr_username');
            $table->string('usr_password');
            $table->integer('usr_acc_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user_accounts');
    }
};

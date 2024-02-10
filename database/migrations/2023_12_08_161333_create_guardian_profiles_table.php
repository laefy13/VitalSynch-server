<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_grdn_profile', function (Blueprint $table) {
            $table->increments('grdn_key');
            $table->string('grdn_id');
            $table->string('grdn_surname');
            $table->string('grdn_first_name');
            $table->string('grdn_mid_name');
            $table->string('grdn_extn_name')->nullable();
            $table->string('grdn_sex');
            $table->date('grdn_birth_date');
            $table->string('grdn_blood_group');
            $table->string('grdn_marital_status');
            $table->string('grdn_contact_number');
            $table->string('grdn_address');
        });
        DB::table('tbl_grdn_profile')->insert([

            'grdn_surname' => 'Smith',
            'grdn_first_name' => 'John',
            'grdn_mid_name' => 'Doe',
            'grdn_sex' => 'Male',
            'grdn_birth_date' => '1990-01-01',
            'grdn_blood_group' => 'O',
            'grdn_marital_status' => 'Single',
            'grdn_contact_number' => '1234567890',
            'grdn_address' => '123 Main Street, City',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_grdn_profile');
    }
};

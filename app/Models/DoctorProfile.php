<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_doctor_profile';
    protected $fillable = [
        'doctor_surname',
        'doctor_first_name',
        'doctor_mid_name',
        'doctor_extn_name',
        'doctor_email_name',
        'doctor_password_name',
        'doctor_sex',
        'doctor_contact_number',
        'doctor_address',
        'doctor_signature'
    ];
}

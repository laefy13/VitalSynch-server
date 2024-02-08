<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class DoctorProfile extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'tbl_doctor_profile';
    protected $fillable = [
        'doctor_id',
        'doctor_surname',
        'doctor_first_name',
        'doctor_mid_name',
        'doctor_extn_name',
        'doctor_email_name',
        'doctor_password_name',
        'doctor_sex',
        'doctor_contact_number',
        'doctor_address',
        'doctor_signature',
        'doctor_department',
        'doctor_position'
    ];
    protected $primaryKey = 'doctor_key';
    protected $hidden = [
        'doctor_password',
    ];

    public function getAuthPassword()
    {
        return $this->doctor_password;
    }

    protected $guard = 'doctor';

}

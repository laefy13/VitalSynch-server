<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class PatientProfile extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'tbl_patient_profile';
    protected $fillable = [
        'ptnt_email',
        'ptnt_password',
        'ptnt_doctor_id',
        'ptnt_surname',
        'ptnt_first_name',
        'ptnt_mid_name',
        'ptnt_extn_name',
        'ptnt_sex',
        'ptnt_allergies',
        'ptnt_birth_date',
        'ptnt_blood_group',
        'ptnt_marital_status',
        'ptnt_contact_number',
        'ptnt_address'
    ];
    protected $primaryKey = 'ptnt_id';
    protected $hidden = [
        'ptnt_password',
    ];

    public function getAuthPassword()
    {
        return $this->ptnt_password;
    }

    
    // protected $guard = 'ptnt';
}

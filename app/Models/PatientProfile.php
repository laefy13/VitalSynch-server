<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_patient_profile';
    protected $fillable = [
        'ptnt_id',
        'ptnt_grdn_id',
        'ptnt_surname',
        'ptnt_first_name',
        'ptnt_mid_name',
        'ptnt_extn_name',
        'ptnt_sex',
        'ptnt_birth_date',
        'ptnt_blood_group',
        'ptnt_marital_status',
        'ptnt_contact_number',
        'ptnt_address'
    ];
}

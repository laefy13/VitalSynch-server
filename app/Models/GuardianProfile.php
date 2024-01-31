<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianProfile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_grdn_profile';
    protected $fillable = [
        'grdn_surname',
        'grdn_first_name',
        'grdn_mid_name',
        'grdn_extn_name',
        'grdn_sex',
        'grdn_birth_date',
        'grdn_blood_group',
        'grdn_marital_status',
        'grdn_contact_number',
        'grdn_address'
    ];
}

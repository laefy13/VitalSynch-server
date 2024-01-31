<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAllergies extends Model
{
   
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_patient_allergies';
    protected $fillable = [
        'pa_ptnt_id',
        'pa_allrgy_id'
    ];
}

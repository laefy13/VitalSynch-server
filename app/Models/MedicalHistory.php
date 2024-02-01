<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_med_history';
    protected $fillable = [
        'medhis_ptnt_id',
        'medhis_record_date',
        'medhis_record_time',
        'medhis_height',
        'medhis_weight',
        'medhis_blood_pressure',
        'medhis_glucose',
        'medhis_illness'
    ];
}

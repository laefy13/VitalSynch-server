<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_prescription';
    protected $fillable = [
        'prescr_ptnt_id',
        'prescr_doctor_id',
        'prescr_date',
        'prescr_time'
    ];
}

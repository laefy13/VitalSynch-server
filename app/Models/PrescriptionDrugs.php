<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDrugs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_prescription_drugs';
    protected $fillable = [
        'pd_prescr_id',
        'pd_drug_id',
        'pd_instruction',
    ];
}

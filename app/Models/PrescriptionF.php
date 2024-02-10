<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionF extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_prescription_files';
    protected $fillable = [
        'pf_link',
        'pf_ptnt_id',
    ];
}

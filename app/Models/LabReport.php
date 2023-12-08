<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_lab_report';
    protected $fillable = [
        'labrep_ptnt_id',
        'labrep_test_date',
        'labrep_test_time',
        'labrep_result',
        'labrep_type'
    ];
}

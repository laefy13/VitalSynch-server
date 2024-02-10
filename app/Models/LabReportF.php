<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReportF extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_labrep_files';
    protected $fillable = [
        'lf_link',
        'lf_ptnt_id',
    ];
}

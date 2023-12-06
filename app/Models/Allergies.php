<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_allergies';
    protected $fillable = [
        'allrgy_name',
       'allrgy_type',
       'allrgy_severity',
       'allrgy_notes'
    ];
}

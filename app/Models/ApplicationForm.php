<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_app_form';
    protected $fillable = [
        'app_full_name',
        'app_department',
        'app_service',
        'app_email'
    ];
}

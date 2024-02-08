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
        'app_birth_date',
        'app_address',
        'app_contact_num',
        'app_sex',
        'app_symptoms',
        'app_doctor_name',
        'app_date',
        'app_time',
        'app_is_accepted',
        'app_reason',
        'app_department',
        'app_service',
    ];
    protected $primaryKey = 'app_queue_num';
}

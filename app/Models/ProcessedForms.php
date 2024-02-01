<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedForms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_processed_forms';
    protected $fillable = [
        'form_app_queue_num',
        'form_appointment_date',
        'form_appointment_time',
        'form_reason',
        'form_isaccepted'
    ];
    protected $primaryKey = 'form_id';
}

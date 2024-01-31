<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_logs';
    protected $fillable = [
        'log_usr_username',
        'log_app_queue_num',
        'log_action'
    ];
    protected $primaryKey = 'log_id';
}

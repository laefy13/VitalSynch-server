<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccounts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_user_accounts';
    protected $fillable = [
        'usr_email',
        'usr_username',
        'usr_password',
        'usr_acc_type'
    ];
    protected $primaryKey = 'usr_email';
}

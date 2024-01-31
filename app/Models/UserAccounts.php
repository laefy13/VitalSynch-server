<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class UserAccounts extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'tbl_user_accounts';
    protected $fillable = [
        'usr_email',
        'usr_username',
        'usr_password',
        'usr_acc_type'
    ];
    protected $hidden = [
        'usr_password',
    ];
    protected $primaryKey = 'usr_email';
    public function getAuthPassword()
    {
        return $this->usr_password;
    }
}

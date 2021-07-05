<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = ['useKey', 'useGroId', 'useUsername', 'usePassword', 
    'useFirstname', 'useLastname', 'useStreet', 'useZIP', 'useCity', 'useState',
    'useMail'];

    protected $primaryKey = 'useKey';

    public function getAuthPassword()
    {
        return $this->usePassword;
    }

}

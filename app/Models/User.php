<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['useKey', 'useGroId', 'useUsername', 'usePassword', 
    'useFirstname', 'useLastname', 'useStreet', 'useZIP', 'useCity', 'useState',
    'useMail'];

    public function getAuthPassword()
    {
        return $this->usePassword;
    }

}

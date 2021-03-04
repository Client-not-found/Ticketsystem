<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['useKey', 'useGroId', 'useUsername', 'usePassword', 
    'useFirstname', 'useLastname', 'useStreet', 'useZip', 'useCity', 'useState',
    'useMail'];
}

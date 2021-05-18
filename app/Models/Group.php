<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['groKey', 'groName'];
    const GROUP_ID_ADMIN = 1;  
    const GROUP_ID_EMPLOYEES = 2;  
}

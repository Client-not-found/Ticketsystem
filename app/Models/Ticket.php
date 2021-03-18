<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticKey', 'ticUseId', 'ticDepId', 'ticSubject', 'ticStatus'];

    public function departement()
    {
        return $this->hasOne(Departement::class, 'depKey', 'ticDepId');
    }
}

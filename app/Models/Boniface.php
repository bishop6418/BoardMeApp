<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boniface extends Model
{
    use HasFactory;

    public function boardingHouses()
    {
        return $this->hasMany(BoardingHouse::class);
    }
}

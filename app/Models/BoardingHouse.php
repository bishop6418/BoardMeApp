<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory;

    public function bonafice()
    {
        return $this->belongsTo(Boniface::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Rating::class);
    }

    public function images()
    {
        return $this->hasMany(BoardingHouseImages::class, 'boarding_houses_id', 'id');
    }
}

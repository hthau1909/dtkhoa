<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public function filmGenre()
    {
        return $this->belongsToMany(Genre::class,'genre_films','film_id','genre_id');
    }
}

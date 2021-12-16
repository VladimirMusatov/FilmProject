<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetFilm extends Model
{
    use HasFactory;

    protected $fillable = [
      'director',
      'duration', 
      'film_id',
    ];

    public function DetFilm(){
      return $this->belongsTo(Film::class);
    }
}

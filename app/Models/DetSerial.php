<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetSerial extends Model
{
    use HasFactory;

    protected $fillable = [
      'season',
      'episodes', 
      'film_id',
    ];

    public function DetSerial(){
      return $this->belongsTo(Film::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episode extends Model
{
    use HasFactory;


    protected $fillable = [
      'title',
      'season', 
      'film_id',
      'episode',
      'link',
      'time',
    ];

    public function episode(){
      return $this->belongsTo(Film::class);
    }

}

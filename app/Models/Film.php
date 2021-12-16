<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

       protected $fillable = [
      'title',
      'description', 
      'image',
      'OrigTitle',
      'CreatDate',
      'category_id',
    ];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function DetFilm(){
        return $this->hasOne(DetFilm::class);
    }

    public function DetSerial(){
        return $this->hasOne(DetSerial::class);
    }
}
 
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
      'Premiere_date',
      'category_id',
      'link',
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

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function watched()
    {
        return $this->hasMany(Watched::class);
    }

}
 
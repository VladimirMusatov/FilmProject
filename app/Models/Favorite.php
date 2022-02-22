<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'film_id',
        'slug',
    ];

    public function User(){
      return $this->belongsTo(User::class);
    }


    public function Film(){
      return $this->belongsTo(Film::class);
    }
}

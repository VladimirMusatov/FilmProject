<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

       protected $fillable = [
      'title',
      'description', 
      'image',
      'OrigTitle',
      'Director',
      'Duration',
      'CreatDate',
      'category_id',
    ];

    public function category(){
      return $this->belongsTo(Category::class);
    }
}

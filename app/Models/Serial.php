<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;


       protected $fillable = [
      'title',
      'OrigTitle',
      'description',
      'CreatDate',
      'seasons',     
      'image',
      'episodes',
      'category_id',
    ];
}

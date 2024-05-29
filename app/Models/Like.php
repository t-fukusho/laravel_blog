<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    // Define the fillable attributes
    protected $fillable = ['user_id', 'article_id'];

    use HasFactory;

}

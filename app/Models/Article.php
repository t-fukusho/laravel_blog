<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'is_variable',
    ];

    // Likeリレーションシップ
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

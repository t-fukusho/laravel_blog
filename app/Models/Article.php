<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

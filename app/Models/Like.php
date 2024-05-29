<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

   
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
    ];

    // Articleリレーションシップ
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}

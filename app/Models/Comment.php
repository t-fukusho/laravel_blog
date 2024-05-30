<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function hasLikedArticle($userId, $articleId)
    {
        return $this->where('user_id', $userId)
                    ->where('article_id', $articleId)
                    ->exists();
    }
    use HasFactory;
}

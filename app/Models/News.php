<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'photo',
        'category_id',
        'is_blocked',
    ];

    public function likeNews()
    {
        return $this->hasMany(Like::class, 'news_id', 'id');
    }

    public function LikeCount()
    {
        return $this->likeNews->count();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
}

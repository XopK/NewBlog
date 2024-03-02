<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'news_id',
        'user_id',
        'comment_text',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
    public function usersComment()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

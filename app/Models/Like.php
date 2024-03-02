<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'news_id',
        'user_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(Like::class);
    }
}

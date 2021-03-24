<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'content', 'view', 'is_activated', 
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'target_id')->where('target_table', 'news');
    }
}

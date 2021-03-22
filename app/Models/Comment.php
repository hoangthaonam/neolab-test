<?php

namespace App\Models;
use App\Models\Blogs;
use App\Models\News;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'target_table', 'target_id', 'comments',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'target_id');
    }

    public function news()
    {
        return $this->belongsTo(News::class, 'target_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

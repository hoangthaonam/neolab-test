<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title', 'content', 'user_id', 'view', 'is_activated', 
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'target_id')->where('target_table', 'blogs');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

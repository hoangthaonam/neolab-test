<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Comment;
use App\Models\Blog;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'fullname', 'email',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
}

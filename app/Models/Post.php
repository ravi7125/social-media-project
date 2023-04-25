<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    use HasFactory;
  
    protected $fillable = [
        'user_id', 'title', 'content', 'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //post like relationship
    public function post_likes()
{
    return $this->hasMany(post_like::class);
}



// new



public function isLikedBy(User $user)
{
    return $this->post_likes()->where('user_id', $user->id)->exists();
}

public function getLikesCountAttribute()
{
    return $this->post_likes()->count();
}




// In your Post model:
public function post_like()
{
    return $this->hasMany(post_like::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}
}

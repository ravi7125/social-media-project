<?php

namespace App\Models;
use App\Models\PostCommentLikes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postcomment extends Model
{
    use HasFactory;
    protected $table = 'postcomments';
    protected $fillable = [
        'user_id', 'post_id', 'comment'
    ];

// This Is Post Comments Relationship...    
public function user()
{
    return $this->belongsTo(User::class);
}

public function post()
{
    return $this->belongsTo(Post::class);
}
// //comment like relationship
//     public function likes()
//     {
//         return $this->hasMany(postcommentlikes::class);
//     }

public function likes()
    {
        return $this->hasMany(postcommentlike::class);
    }

}



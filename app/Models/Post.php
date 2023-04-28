<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'content', 'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
// This Is Post Like Relationship    
    public function likes()
    {
      return $this->hasMany(Post_like::class);
    }
// This Is Post comment Relationship    
    public function comments()
    {
        return $this->hasMany(postcomment::class);
    }

// COMMENT LIKE RELATIONSHIP..
    public function postcomment()
    {
        return $this->hasManyThrough(postcomment::class);
     }





// this is postlikecomment relation.....

public function commentlikes()
{
  return $this->hasMany(postcommentlikes::class);
}


}









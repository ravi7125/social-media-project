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
// This Is Post Like Relationship    
    public function likes()
    {
      return $this->hasMany(Post_like::class);
    }
// This Is Post comment Relationship    
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }


}









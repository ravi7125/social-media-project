<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class post_like extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'post_likes';
    protected $fillable = [
        'user_id',
        'post_id',
        'is_like',
        'is_dislike'
    ];

    // // post like relationship
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  

}

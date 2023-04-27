<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class postcommentlike extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'postcommentlikes';

    protected $fillable = [
        'post_id',
        'user_id',
        'comment_id',
        'is_like'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(postcomment::class);
    }


}

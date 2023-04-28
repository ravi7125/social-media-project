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
        'postcomment_id',
        'is_like',
        'is_dislike'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(postcomment::class);
    }

//
public function postcomment()
{
    return $this->belongsTo(postcomment::class);
}




}

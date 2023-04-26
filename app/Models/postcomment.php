<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postcomment extends Model
{
    use HasFactory;
    protected $table = 'postcomments';

// This Is Post Comments Relationship...    
public function user()
{
    return $this->belongsTo(User::class);
}

public function post()
{
    return $this->belongsTo(Post::class);
}

}
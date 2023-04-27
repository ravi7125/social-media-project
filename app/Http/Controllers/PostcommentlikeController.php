<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_like;
use App\Models\Post;
use App\Models\postcomment;
use App\Models\postcommentlike;
use Illuminate\Support\Facades\Auth;
class PostcommentlikeController extends Controller
{
    public function like(postcomment $postcomment)
{
    $postcomment->likes()->create([
        'postcomment_id' => $postcomment->id,
        'user_id' => auth()->id(),
    ]);
    

    return back('commentview/{id}');
}
}
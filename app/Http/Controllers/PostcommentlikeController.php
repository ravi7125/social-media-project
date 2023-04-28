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
    public function postcommentlike($post_id, $comment_id)
    {
        $comment = postcomment::find($comment_id);
        if (!$comment) {
            
        }
    
        $like = postcommentlike::where('user_id', Auth::id())
            ->where('post_id', $post_id)
            ->where('postcomment_id', $comment_id)
            ->first();
       
        if (!$like) {
            // This is the first click, so create a new record with is_like set to 1
            $like = postcommentlike::create([
                'user_id' => Auth::id(),
                'post_id' => $post_id,
                'is_like' => 1,
                'is_dislike' => 0,
                'postcomment_id' => $comment_id,
            ]);
            
        } elseif ($like->is_like) {
    // This is the second click to  record to set is_like to 0 update
            $like->update(['is_like' => 0, 'is_dislike' => 1]);
        } else {
    // This is a click to record to set is_like to 1 update
            $like->update(['is_like' => 1, 'is_dislike' => 0]);
        }
    
        $likeCount = postcommentlike::where('post_id', $post_id)
        ->where('postcomment_id', $comment_id)
        ->where('is_like', true)
        ->count();
        //  dd($like);
        return redirect('/post/show');
       
    }
// This is a commentdislike logic.....
public function postcommentdislike($post_id, $comment_id)
{
    $comment = postcomment::find($comment_id);
    if (!$comment) {
        // handle error if comment is not found
    }

    $dislike = postcommentlike::where('user_id', Auth::id())
        ->where('post_id', $post_id)
        ->where('postcomment_id', $comment_id)
        ->first();

    if (!$dislike) {
        // This is the first click, so create a new record with is_dislike set to 1
        $dislike = postcommentlike::create([
            'user_id' => Auth::id(),
            'post_id' => $post_id,
            'is_like' => 0,
            'is_dislike' => 1,
            'postcomment_id' => $comment_id,
        ]);

    } elseif ($dislike->is_dislike) {
        // This is the second click, update is_dislike to 0
        $dislike->update(['is_dislike' => 0]);
    } else {
        // This is a click, update is_dislike to 1
        $dislike->update(['is_like' => 0, 'is_dislike' => 1]);
    }

    $dislikeCount = postcommentlike::where('post_id', $post_id)
        ->where('postcomment_id', $comment_id)
        ->where('is_dislike', true)
        ->count();
        // dd($dislike);
    return redirect('/post/show');
}




}
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
            // handle error if comment is not found
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
                'comment_like' => 1,
                'comment_dislike' => 0,
                'postcomment_id' => $comment_id,
            ]);
    
        } elseif ($like->comment_like) {
            // This is the second click, update is_like to 0
            $like->update(['comment_like' => 0]);
        } else {
            // This is a click, update is_like to 1
            $like->update(['comment_like' => 1, 'comment_dislike' => 0]);
        }
    
        $likeCount = postcommentlike::where('post_id', $post_id)
            ->where('postcomment_id', $comment_id)
            ->where('comment_like', true)
            ->count();
            // dd($like);
            
            return redirect()->back()->with('success',' User Commentlike');
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
            'comment_like' => 0,
            'comment_dislike' => 1,
            'postcomment_id' => $comment_id,
        ]);

    } elseif ($dislike->comment_dislike) {
        // This is the second click, update is_dislike to 0
        $dislike->update(['comment_dislike' => 0]);
    } else {
        // This is a click, update is_dislike to 1
        $dislike->update(['comment_like' => 0, 'comment_dislike' => 1]);
    }

    $dislikeCount = postcommentlike::where('post_id', $post_id)
        ->where('postcomment_id', $comment_id)
        ->where('comment_dislike', true)
        ->count();
        // dd($dislike);
        
        return redirect()->back()->with('success',' User Commentdislike');
    }

}
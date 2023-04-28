<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post_like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $existingLike = post_like::where('user_id', Auth::user()->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingLike && $existingLike->is_like) {
            $existingLike->update([
                'is_like' => 0,
            ]);
        } elseif ($existingLike && !$existingLike->is_like) {
            $existingLike->update([
                'is_like' => 1,
                'is_dislike' => 0,
            ]);
        } else {
            post_like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'is_like' => 1,
                'is_dislike' => 0,
            ]);
        }
// COUNT TO LIKE AND  DISLIKE ...       
        $likeCount = $post->likes->where('is_like', 1)->count();
        return redirect('/post/show')->with('success', 'Post liked success!');
    }
    public function dislike(Post $post)
    {
        $existingDislike = post_like::where('user_id', Auth::user()->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingDislike && $existingDislike->is_dislike) {
            $existingDislike->update([
                'is_dislike' => 0,
            ]);
        } elseif ($existingDislike && !$existingDislike->is_dislike) {
            $existingDislike->update([
                'is_dislike' => 1,
                'is_like' => 0,
            ]);
        } else {
            post_like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'is_dislike' => 1,
                'is_like' => 0,
            ]);
        }
        // Update like and dislike count
        $dislikeCount = $post->likes->where('is_dislike', 1)->count();
        return redirect('/post/show')->with('success', 'Post disliked success');
    }  

    public function show(Post $post)
    {
        $post_like = post_like::where('post_id', $post->id)->first();

        return view('/post/show');
    }


    public function showPostLikes($postId)
    {
        $post_likes = post_like::where('post_id', $postId)->get();
        return view('postLikes', ['post_likes' => $post_likes]);
    }



}
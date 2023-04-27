<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_like;
use App\Models\Post;
use App\Models\postcomment;

use Illuminate\Support\Facades\Auth;

class PostcommentController extends Controller
{
    public function store(Request $request,Post $post)
    {
        
        // Save the new postcomment
        $postcomment = new postcomment;
        $postcomment->post_id = $post->id;
        $postcomment->user_id = auth()->id();
        $postcomment->comment = $request->comment;
        $postcomment->save();
        return redirect('/post/show');
     
    }
    
    public function view(Post $post)
    {
        $postcomment = Postcomment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        $latestComment = $postcomment->first();
        return view('post.comment', compact('post', 'postcomment', 'latestComment'));
    }
    
    



}


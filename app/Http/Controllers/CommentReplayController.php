<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_like;
use App\Models\Post;
use App\Models\User;
use App\Models\postcomment;
use App\Models\postcommentlike;
use App\Models\comment_replay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CommentReplayController extends Controller
{
    public function create(Request $request,$id)
    
    {
    
        $this->validate($request, [
            'comment_replay'  => 'required',
        ]);
        $postcomment = postcomment::find($id);
  
        $comment_replay = comment_replay::create($request->only('comment_replay')
            + [
                'user_id'   => $postcomment->user_id,
                'postcomment_id' => $postcomment->id,
                'post_id'   => $postcomment->post_id
            ]);
            // return redirect()->route('post.comment', $postcomment->post_id)->with('success', 'Post commentreplay successfully!');

    
         return redirect()->back()->with('success','comment_replay successfully!');
        // return redirect('/post/show');
    }

    
    public function show(Post $post, postcomment $comment)
    {
        $postcomment = $post->postcomments; // assuming you have a relationship set up between Post and Postcomment models
        $comment_replay = comment_replay::where('post_id', $post->id)
                                       ->where('postcomment_id', $comment->id)
                                       ->orderBy('created_at', 'desc')
                                       ->get();
        return view('post.commentreplay', compact('post', 'comment', 'postcomment', 'comment_replay'));
    }
    

}

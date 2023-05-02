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
        $postcomment = new postcomment;  // Save the new postcomment
        $postcomment->post_id = $post->id;
        $postcomment->user_id = auth()->id();
        $postcomment->comment = $request->comment;
        $postcomment->save();
         return redirect()->back()->with('success','Postcomment successfully!');
        // return redirect('/post/show');
    }
    
    // public function view(Post $post) // post comment display ...
    // {
    //     $postcomment = Postcomment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
    //     $latestComment = $postcomment->first();
    //     return view('post.comment', compact('post', 'postcomment', 'latestComment'));
    // }

    public function view(Post $post) // post comment display ...
    {
        $postcomment = postcomment::with('comment_replay')->where('post_id', $post->id)->orderBy('created_at', 'desc')->get();             
        $latestComment = $postcomment->first();
        return view('post.comment', compact('post', 'postcomment', 'latestComment'));
    }

    public function delete($id) // Only Auth user Comment delete an other user comment not delete ....   
    {
        $postcomment = postcomment::findOrFail($id);
        $postcomment->delete();
        return redirect()->back()->with('success',' User Comment deleted');
    }
    
}


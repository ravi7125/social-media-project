<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\post_like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;



class PostController extends Controller
{
// User post create ...    
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title'   => 'required|max:255',
            'content' => 'required|max:255',
            'image'   => 'required|image|',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        $user_id = $request->input('user_id') ?? auth()->user()->id;
        $image_path = $request->file('image')->store('public/images');
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $image_path;
        $post->user_id = $user_id;
        $post->save();

        return redirect('post/show');
    }
// All user post display...    
    public function show()
    {
        $post = Post::orderBy('created_at', 'desc')->get();  // User post display to descending order..
        return view('post/show', ['posts' => $post]);
    }  


    public function edit(Post $post)
    {
        return view('post.update', compact('post'));
    }
// User post detail update...
    public function update(Request $request, $id)
{
    $validation = Validator::make($request->all(), [
        'title'    => 'required|max:255',
        'content'  => 'required|max:255',
        'image'    => 'image|',
    ]);

    if ($validation->fails()) {
        return back()->withErrors($validation)->withInput();
    }

        $post = Post::findOrFail($id);
    // // Check if the authenticated user is authorized to update the post not auth to not update post
    // if (! auth()->user()->can('update', $post)) {
    //     abort(403);
    // }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        
    if ($request->hasFile('image')) 
    {  
        Storage::delete($post->image);// Delete the old image file
        $image_path = $request->file('image')->store('public/images');
        $post->image = $image_path;
    }
        $post->save();
    return redirect('post/userpost/{id}');
}

// user post delete...
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('post/userpost/{id}');
    }
// particular auth user post display...   
   public function userpost($userId)
{
    $userId = auth()->id();
    $post = Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    return view('post/userpost', ['post' => $post]);
    
}

}

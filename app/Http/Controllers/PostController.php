<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'required|image|',
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
    public function show()
    {
        $post = Post::all();
        return view('post/show', ['posts' => $post]);
    }  

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
        ]);
    
        // Get the post by ID
        $post = Post::findOrFail($id);
    
        // Update the post data
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $filename);
            $post->image = $filename;
        }
    
        // Save the updated post
        $post->save();
    
        // Redirect back to the post with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }
    

public function delete($id){
    $post = Post::findOrFail($id);
    $post->delete();
   
}
   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    public function likePost(Request $request){
        $user = Auth::user();
        $post_id = $request-> liked;
        $post = Post::where('id', $request->liked)->first();
        $isLikedAlready = post_like::where('user_id', $user->id)->where('post_id', $post_id)->where('is_like', true)->first();
        if(!$isLikedAlready || $user->id !== $isLikedAlready-> user_id){
            post_like::create([
                'user_id' => $user->id,
                'post_id' => $post_id,
                'liked' => true,
            ]);
            return response(["message"=>"liked", "likes" => $post->likes->count()]);
        }
        else{
            $isLikedAlready->delete();
            return response(["message" => "unliked", "likes" => $post-> likes-> count()]);
        }
    }
}

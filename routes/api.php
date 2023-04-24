<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// <body>
//     <br><br><br>
//     <div class="container">
//         <div class="row">
//             @foreach ($post as $post)
//             <div class="col col-lg-4 border bg-light px-md-5">
//                 <img src="{{ Storage::url($post->image) }}" alt="" style="width:100%;margin-top:15%;margin-bottom:1%;height: 80%">
//                 <div class="d-flex justify-content-between mt-3">
//                     <a href={{'edit/'.$post['id']}} class="btn btn-sm btn-primary">Edit</a>
//                     <form action="{{'delete/'.$post['id']}}" method="POST">
//                         @csrf
//                         @method('DELETE')
//                         <button type="submit" class="btn btn-sm btn-danger">Delete</button>
//                     </form>
//                 </div>
//             </div>
//         @endforeach
        
//         </div>
       
//     </div>
// </body>
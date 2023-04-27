<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostcommentController;
use App\Http\Controllers\PostcommentlikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// post route 
    Route::post ('/post/create',         [PostController::class,'create']) ->name('post.create');;
    Route::get  ('/post/show',           [PostController::class,'show'])   ->name('post.show');
    Route::post ('/post/edit/{id}',      [PostController::class,'update']);
    Route::get  ('/post/delete/{id}',    [PostController::class,'delete']);
    Route::get  ('/post/edit/{post}',    [PostController::class,'edit'])   ->name('post.edit');
    Route::put  ('/post/update/{post}',  [PostController::class,'update']) ->name('post.update');
    Route::post ('/upload-image',        [PostController::class,'upload']);
    Route::get  ('/post/userpost/{post}',[PostController::class,'userpost']);
    Route::view ('/post/create','/post/create');
    Route::view ('/post/edit','/post/edit');
    Route::view ('/post/update','/post/update');
    Route::view ('/post/comment','/post/comment');
// POST LIKE AND DISLIKE ROUTE ...
    Route::get('/like/{post}',         [PostlikeController::class,'like'])           ->name('postlike.like');
    Route::get('/dislike/{post}',      [PostlikeController::class,'dislike'])        ->name('postlike.dislike');
    Route::get('/post/{postId}/likes', [PostLikeController::class,'showPostLikes'])  ->name('postLikes.show');
    Route::get('/post/{post}',         [PostLikeController::class,'show'])           ->name('post.show');
    Route::get('/post/{post}',         [PostLikeController::class,'show']);
// Post Comment Route
   Route::post ('/post/comment/{post}',    [PostcommentController::class,'store'])->name('post.comment');
   Route::get ('/post/commentview/{post}',[PostcommentController::class,'view'])->name('post.commentview');



// USER ROUTE
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});





// coment like and dislike
// Route::get('/commentlike/{post}',        [PostcommentController::class,'commentlike'])           ->name('commentlike.like');
// Route::get('/commentdislike/{post}',     [PostcommentController::class,'commentdislike'])        ->name('commentlike.dislike');
// Route::get('/post/{postId}/likes',       [PostcommentController::class,'showcommentLikes'])  ->name('commentLikes.show');
// Route::get('/post/{post}',               [PostcommentController::class,'showcomment']);       
Route::get('commentlike/{comment}', [PostcommentlikeController::class, 'like'])->name('commentlike');


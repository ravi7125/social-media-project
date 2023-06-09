<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostcommentController;
use App\Http\Controllers\PostcommentlikeController;
use App\Http\Controllers\CommentReplayController;
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
   Route::get  ('/commentdelete/{comment}',    [PostcommentController::class,'delete']);


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
Route::get('/commentis-like/{post_id}/{comment_id?}', [PostcommentlikeController::class, 'postcommentlike'])->name('postlike.postcommentlike');
Route::get('/commentdis-like/{post}/{postcomment?}', [PostcommentlikeController::class, 'postcommentdisLike'])->name('postlike.postcommentdisLike');

// comment replay route
Route::post ('/post/commentreplay/{post}/{comment_id?}',[CommentReplayController::class,'create'])->name('post.commentreplay');
Route::get ('/post/commentview/{post}/{comment_id?}',[CommentReplayController::class,'show'])->name('post.commentviewreplay');

// comment replay display blade
Route::get ('/post/commentdisplay/{post}/{comment_id?}',[CommentReplayController::class,'commentreplayshow'])->name('post.commentdisplay');
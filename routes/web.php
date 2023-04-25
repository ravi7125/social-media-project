<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\LikeController;
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
    Route::post('/post/create',[PostController::class,'create'])->name('post.create');;
    Route::get('/post/show',[PostController::class,'show'])->name('post.show');
    Route::post('/post/edit/{id}',[PostController::class,'update']);
    Route::get('/post/delete/{id}',[PostController::class,'delete']);
    Route::get('/post/edit/{post}', [PostController::class,'edit'])->name('post.edit');
    Route::put('/post/update/{post}',[PostController::class,'update'])->name('post.update');
    Route::post('/upload-image', [PostController::class, 'upload']);
    Route::view('/post/create','/post/create');
    Route::view('/post/edit','/post/edit');
    Route::view('/post/update','/post/update');
	Route::get('/post/userpost/{post}',[PostController::class,'userpost']);



// post-like route	
    Route::post('/like-post/{id}',[PostController::class,'likePost'])->name('like.post');
    Route::post('/unlike-post/{id}',[PostController::class,'unlikePost'])->name('unlike.post');
 //25 date
Route::post('/like', [LikeController::class, 'likePost'])->name('likePost');
Route::post('/unlike', [LikeController::class, 'likePost'])->name('unlikePodt');   
// user route
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



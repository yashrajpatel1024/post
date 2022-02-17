<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class,'guestpost'])
    ->middleware(['guest'])->name('posts');

//Post
Route::get('/posts', [PostController::class,'index'])
    ->middleware(['auth'])->name('posts.index');
//Post Create
Route::get('/posts/create', [PostController::class,'create'])
    ->middleware(['auth'])->name('posts.create');
//Post Store
Route::post('/posts/store', [PostController::class,'store'])
    ->middleware(['auth'])->name('posts.store');
//Post Edit
Route::get('/posts/edit/{post}', [PostController::class,'edit'])
    ->middleware(['auth'])->name('posts.edit');
//Post Update
Route::post('/posts/update/{post}', [PostController::class,'update'])
    ->middleware(['auth'])->name('posts.update');
//Post Delete
Route::get('/posts/destroy/{post}', [PostController::class,'destroy'])
    ->middleware(['auth'])->name('posts.destroy');
//Show Post
Route::get('/posts/viewpost/{posts}', [PostController::class,'viewpost'])
    ->middleware(['auth'])->name('posts.viewpost');

//Comment

    Route::post('/comment/store', [CommentController::class,'store'])
    ->middleware(['auth'])->name('comment.store');
//Comment Edit
Route::get('/comment/edit/{post}', [CommentController::class,'edit'])
    ->middleware(['auth'])->name('comment.edit');
//Comment Update
Route::post('/comment/update/{post}', [CommentController::class,'update'])
    ->middleware(['auth'])->name('comment.update');
//Comment Delete
Route::get('/comment/destroy/{post}', [CommentController::class,'destroy'])
    ->middleware(['auth'])->name('comment.destroy');

require __DIR__.'/auth.php';

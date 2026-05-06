<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//get all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//create post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

//store posts
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//show post by id
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//edit post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');


//update post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

//delete post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//restore post
Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');



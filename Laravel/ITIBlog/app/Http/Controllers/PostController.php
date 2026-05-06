<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
    $posts = [
        ['id' => 1, 'title' => 'Post 1 title', 'description' => 'post1 description'],
        ['id' => 2, 'title' => 'Post 2 title', 'description' => 'post2 description'],
        ['id' => 3, 'title' => 'Post 3 title', 'description' => 'post3 description'],
        ['id' => 4, 'title' => 'Post 4 title', 'description' => 'post4 description'],
    ];
    return view('posts.index', compact('posts'));
}

    public function show($id){
        $post = [
            'id' => $id,
            'title' => 'post details for id : '.$id,
            'description' => 'description details for post: '.$id,
        ];
        return view('posts.show', compact('post'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts);
    }

    public function show($id) {
        $post = Post::with('user')->findOrFail($id);
        return new PostResource($post);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Auth::user()->posts()->create($validated);

        return new PostResource($post->load('user'));
    }
    public function update(Request $request, $id){
        $post = Post::findOrFail($id);


        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
        ]);

        $post->update($validated);

        return new PostResource($post->load('user'));
        }

    public function destroy($id){
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}

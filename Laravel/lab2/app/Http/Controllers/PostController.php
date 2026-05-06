<?php

namespace App\Http\Controllers;
use App\Http\Responses\PostResponse;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withTrashed()->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
        ],
        [
            'title.required' => 'post title is required',
            'title.min' => 'post title must be more than 5 char',
            'content.required' => 'post content is required',
            
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
        ],
        [
            'title.required' => 'post title is required',
            'title.min' => 'post title must be more than 5 char',
            'content.required' => 'post content is required',
            
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }
    public function restore($id) {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('posts.index');
    }
}

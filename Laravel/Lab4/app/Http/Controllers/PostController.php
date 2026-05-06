<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::with('user')->get();
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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body'  => 'required|string', 
        'image' => 'nullable|image|mimes:jpg,png|max:2048', 
    ]);

    Post::create([
        'title'   => $validated['title'],
        'body'    => $validated['body'],
        'user_id' => auth()->id(),
        'image'   => $request->file('image'),
    ]);

    return redirect()->route('posts.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $post->update([
            'title' => $validated['title'],
            'image' => $request->file('image') ?? $post->image,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();
        return redirect()->route('posts.index');
    
    }
}

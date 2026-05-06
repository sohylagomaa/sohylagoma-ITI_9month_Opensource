<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $this->sendSuccess($posts, 'Posts fetched successfully');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());
        return $this->sendSuccess($post, 'Post created successfully', 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            return $this->sendError('Post Not Found', [], 404);
        }

        return $this->sendSuccess($post, 'Post retrieved successfully');
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) return $this->sendError('Post Not Found', [], 404);

        if ($post->user_id !== auth()->id()) {
            return $this->sendError('Forbidden', ['auth' => 'Access denied'], 403);
        }

        $post->update($request->validated());
        return $this->sendSuccess($post, 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) return $this->sendError('Post Not Found', [], 404);

        if ($post->user_id !== auth()->id()) {
            return $this->sendError('Forbidden', ['auth' => 'Access denied'], 403);
        }

        $post->delete();
        return $this->sendSuccess(null, 'Post deleted successfully');
    }

    private function sendSuccess($data, string $message, int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ], $code);
    }

    private function sendError(string $message, array $errors = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }
        return response()->json($response, $code);
    }
}

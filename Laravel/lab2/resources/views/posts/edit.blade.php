@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Post: {{ $post->title }}</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT') <div>
            <label class="block text-sm font-medium text-gray-700">Post Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                   class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="4" 
                      class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm">{{ old('content', $post->content) }}</textarea>
            @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700">
            Update Post
        </button>
    </form>
</div>
@endsection









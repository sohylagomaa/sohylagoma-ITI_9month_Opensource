@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        
        <div class="mb-4">
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block">Current Image</label>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-32 object-cover mb-2">
            @endif
            <label class="block text-sm text-gray-500">Change Image (jpg/png only):</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Update Post</button>
    </form>
</div>
@endsection
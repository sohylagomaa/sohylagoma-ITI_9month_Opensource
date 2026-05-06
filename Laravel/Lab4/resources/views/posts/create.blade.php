@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Create New Post</h2>
    
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Body</label>
            <input type="text" name="body" class="w-full border p-2 rounded">
            @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Post Image (.jpg, .png only)</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Post</button>
    </form>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create New Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf <div>
            <label class="block text-sm font-medium text-gray-700">Post Title</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm @error('title') border-red-500 @enderror">
            
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="4" 
                      class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
            
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('posts.index') }}" class="bg-gray-600 rounded-md px-6 py-2 text-white  hover:bg-gray-700">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                Save Post
            </button>
        </div>
    </form>
</div>
@endsection






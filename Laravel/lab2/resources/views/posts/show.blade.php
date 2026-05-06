@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 leading-relaxed">{{ $post->content }}</p>
        
        <div class="mt-6 pt-4 border-t border-gray-100">
            <span class="text-sm text-gray-500">
                Created at: {{ $post->created_at->format('M d, Y') }} 
                ({{ $post->created_at->diffForHumans() }})
            </span>
        </div>

        <a href="{{ route('posts.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
            Back to All Posts
        </a>
    </div>
@endsection



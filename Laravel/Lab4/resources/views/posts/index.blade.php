@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="bg-white p-4 rounded shadow">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-40 object-cover rounded">
            @endif
            <h3 class="font-bold mt-2">{{ $post->title }}</h3>
            <p class="text-gray-600 text-sm">By: {{ $post->user->name }}</p>

            <div class="flex mt-4 space-x-2">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Update</a>
                @endcan

                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection
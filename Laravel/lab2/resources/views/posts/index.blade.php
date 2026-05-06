@extends('layouts.app')

@section('content')
<div class="overflow-x-auto rounded-lg border border-gray-200">
    <div class="flex justify-between items-center p-4 bg-white">
        <h1 class="text-xl font-bold">All Posts</h1>
        <a href="{{ route('posts.create') }}">
            <x-button type="primary">Create New Post</x-button>
        </a>    
    </div>
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="text-left uppercase font-bold text-gray-900">
            <tr>
                <th class="whitespace-nowrap px-4 py-3 font-bold text-gray-900">Title</th>
                <th class="whitespace-nowrap px-4 py-3 font-bold text-gray-900">Created At (Carbon)</th>
                <th class="whitespace-nowrap px-4 py-3 font-bold text-gray-900">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($posts as $post)
            <tr class="{{ $post->trashed() ? 'bg-red-50' : 'hover:bg-gray-50 transition-colors' }}">
                <td class="px-4 py-2 font-medium text-gray-900">{{ $post->title }}</td>
                
                <td class="px-4 py-2 text-gray-700">
                    {{ $post->created_at->format('d/m/Y') }} 
                    <span class="inline-flex items-center justify-center rounded-full bg-blue-100 px-2.5 py-0.5 text-blue-700">
                        <p class="whitespace-nowrap text-xs">{{ $post->created_at->diffForHumans() }}</p>
                    </span>
                </td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <x-button type="primary" class="px-2 py-1 text-xs">View</x-button>
                    </a>     

                    @if($post->trashed())
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <x-button type="success" class="text-green-600 hover:text-green-900 bg-green-50 px-3 py-1 rounded-full">Restore</x-button>
                        </form>
                    @else
                        <x-button type="danger" class="px-2 py-1 text-xs" onclick="openModal({{ $post->id }})">
                            Delete
                        </x-button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="p-4 bg-white border-t">
        {{ $posts->links() }}
        
    </div>

    
    <div id="deleteModal" class="fixed inset-0 z-50 hidden place-content-center bg-black/50 p-4" role="dialog" aria-modal="true">
    <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
        <div class="flex items-start justify-between">
        <h2 class="text-xl font-bold text-gray-900 sm:text-2xl">Are you sure?</h2>

        <button onclick="closeModal()" type="button" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>

        <div class="mt-4">
            <p class="text-pretty text-gray-700">
                Doing this will move the post to the trash. You can restore it later.
            </p>
        </div>

        <footer class="mt-6 flex justify-end gap-2">
        <button onclick="closeModal()" type="button" class="rounded bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200">
            No, go back
        </button>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                Yes, I'm sure
            </button>
        </form>
        </footer>
    </div>
</div>
</div>
<script>

    function openModal(postId) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');

        form.action = '/posts/' + postId;

        modal.classList.remove('hidden');
        modal.classList.add('grid');
    }

    function closeModal() {
        const modal = document.getElementById('deleteModal');
        
        modal.classList.add('hidden');
        modal.classList.remove('grid');
    }

    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>

@endsection









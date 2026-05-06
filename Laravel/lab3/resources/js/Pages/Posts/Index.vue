<script setup>
import { Link , router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

defineProps({ posts: Array });

const deletePost = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "you can't restore this post after delete ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'confirm!',
        cancelButtonText: 'cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('posts.destroy', id), {
                onSuccess: () => {
                    Swal.fire(
                        'done',
                        'deleted successfully',
                        'success'
                    );
                }
            });
        }
    });
}
</script>

<template>
    <div class="max-w-6xl mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">All Posts</h1>
            <Link :href="route('posts.create')" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create New Post
            </Link>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Slug</th> <th class="py-2 px-4 border-b">Created By</th>
                    <th class="py-2 px-4 border-b">Desc</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id" class="text-center">
                    <td class="py-2 px-4 border-b">{{ post.id }}</td>
                    <td class="py-2 px-4 border-b">{{ post.title }}</td>
                    <td class="py-2 px-4 border-b text-blue-500 italic">{{ post.slug }}</td>
                    <td class="py-2 px-4 border-b">{{ post.user ? post.user.name : 'Unknown' }}</td>
                    <td class="py-2 px-4 border-b">{{ post.description }}</td>

                    <td class="py-2 px-4 border-b">
                        <Link :href="route('posts.show', post.id)" class="text-green-600 font-bold ml-2">
                            View
                        </Link>
                        <Link :href="route('posts.edit', post.id)" class="text-blue-600 ml-2">Edit</Link>
                        <button @click="deletePost(post.id)" class="text-red-600 ml-2">
                            Delete
                        </button>
   
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</template>
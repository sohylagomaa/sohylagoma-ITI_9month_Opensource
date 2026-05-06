<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
    const props = defineProps({ post: Object });

    const form = useForm({ body: '' });

    const submitComment = () => {
        form.post(route('comments.store', props.post.id), {
            onSuccess: () => form.reset(),
        });
};
</script>

<template>
    <div class="p-8">
        <h1 class="text-2xl font-bold">{{ post.title }}</h1>
        <p class="text-gray-500">Slug: {{ post.slug }}</p> <p class="mt-4">{{ post.description }}</p>
        <p class="mt-2 text-sm text-blue-600">Created by: {{ post.user.name }}</p>

        <hr class="my-6" />
        <h3 class="font-bold mb-4">Comments:</h3>
        <div v-for="comment in post.comments" :key="comment.id" class="border-b mb-2 pb-2">
            <p>{{ comment.body }}</p>
            <small class="text-gray-400">By: {{ comment.user.name }}</small>
        </div>
        <div v-if="$page.props.auth.user" class="mt-6">
            <textarea v-model="form.body" class="border w-full p-2" placeholder="Add a comment..."></textarea>
            <button @click="submitComment" class="bg-green-500 text-white px-3 py-1 mt-2">Comment</button>
        </div>
        <div v-else class="text-orange-500 mt-4 italic">
            Please login to add a comment.
        </div>
    </div>
</template>
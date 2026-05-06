<script setup>
import { useForm } from '@inertiajs/vue3';

    defineProps({ users: Array });

    const form = useForm({
        title: '',
        description: '',
        user_id: '',
    });

    const submit = () => {
        form.post(route('posts.store'));
    };
</script>

<template>
    <div class="max-w-2xl mx-auto p-4">
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label>Title</label>
                <input v-model="form.title" type="text" class="border w-full p-2" />
                <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
            </div>
            <div>
                <label>Description</label>
                <textarea v-model="form.description" class="border w-full p-2"></textarea>
                <div v-if="form.errors.description" class="text-red-500 text-sm">{{ form.errors.description }}</div>
            </div>
            <div>
                <label>Post Creator</label>
                <select v-model="form.user_id" class="border w-full p-2">
                    <option v-for="user in users" :key="user.id" :value="user.id">
                        {{ user.name }}
                    </option>
                </select>
                <div v-if="form.errors.user_id" class="text-red-500 text-sm">{{ form.errors.user_id }}</div>
            </div>
            <button type="submit" :disabled="form.processing" class="bg-blue-500 text-white px-4 py-2">
                Create Post
            </button>
        </form>
    </div>
</template>
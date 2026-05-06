<script setup>
import { onMounted, onUnmounted } from "vue";

onMounted(() => {
  console.log("About mounted");
});

onUnmounted(() => {
  console.log("About unmounted");
});
</script>

<template>
  <div class="max-w-3xl mx-auto p-10">
    <h1 class="text-4xl font-bold mb-4">About This Store</h1>

    <p class="text-lg text-gray-600">
      My name is Sohyla. This project is part of the ITI Vue course
    </p>
  </div>
</template>

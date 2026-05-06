<script setup>
import { onMounted, onUnmounted } from "vue";

onMounted(() => {
  console.log("NavBar mounted");
});

onUnmounted(() => {
  console.log("NavBar unmounted");
});
</script>

<template>
  <div class="navbar bg-base-100 shadow-lg px-8">
    <div class="flex-1">
      <RouterLink to="/" class="text-2xl font-bold text-primary">
        VueStore
      </RouterLink>
    </div>

    <div class="flex gap-4">
      <RouterLink to="/" class="btn btn-ghost"> Home </RouterLink>

      <RouterLink to="/product/1" class="btn btn-ghost"> Products </RouterLink>

      <RouterLink to="/about" class="btn btn-ghost"> About </RouterLink>
    </div>
  </div>
</template>

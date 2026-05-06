<script setup>
import { useCartStore } from "@/stores/cartStore";

const cartStore = useCartStore();
</script>

<template>
  <div class="navbar bg-base-200 px-6">
    <div class="flex-1 text-xl font-bold">Vue Store</div>

    <div class="flex gap-4">
      <RouterLink to="/">Home</RouterLink>

      <RouterLink to="/cart"> Cart ({{ cartStore.totalItems }}) </RouterLink>

      <RouterLink to="/about">About</RouterLink>
    </div>
  </div>
</template>

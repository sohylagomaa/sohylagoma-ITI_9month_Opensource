<script setup>
import { onMounted, onUnmounted } from "vue";

const props = defineProps(["product"]);

onMounted(() => {
  console.log("ProductCard mounted");
});

onUnmounted(() => {
  console.log("ProductCard unmounted");
});
</script>

<template>
  <div class="card bg-base-100 shadow-md hover:shadow-xl transition">
    <figure class="p-6">
      <img :src="product.image" class="rounded-xl h-50 w-50" />
    </figure>

    <div class="card-body items-center text-center">
      <h2 class="card-title">
        {{ product.name }}

        <div v-if="product.badge" class="badge badge-secondary">
          {{ product.badge }}
        </div>
      </h2>

      <p class="text-lg font-bold text-primary">${{ product.price }}</p>

      <div class="card-actions">
        <RouterLink
          :to="`/product/${product.id}`"
          class="btn btn-primary btn-sm"
        >
          View Product
        </RouterLink>
      </div>
    </div>
  </div>
</template>

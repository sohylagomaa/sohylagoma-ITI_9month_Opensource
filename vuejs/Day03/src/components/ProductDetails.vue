<script setup>
import { useCartStore } from "@/stores/cartStore";

const props = defineProps(["product"]);

const cartStore = useCartStore();
</script>

<template>
  <div class="grid md:grid-cols-2 gap-8">
    <img :src="product.image" class="rounded" />

    <div>
      <h1 class="text-3xl font-bold">
        {{ product.name }}
      </h1>

      <p class="mt-4">
        {{ product.description }}
      </p>

      <p class="text-xl font-bold mt-4">${{ product.price }}</p>

      <p class="mt-2">Stock: {{ product.stock }}</p>
      <button
        class="btn btn-primary mt-4"
        @click="cartStore.addToCart(product)"
        :disabled="product.stock === 0"
      >
        {{ product.stock === 0 ? "Out of Stock" : "Buy Now" }}
      </button>
    </div>
  </div>
</template>

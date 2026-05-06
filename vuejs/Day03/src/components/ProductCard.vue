<script setup>
import { useCartStore } from "@/stores/cartStore";

const props = defineProps(["product"]);

const cartStore = useCartStore();
</script>
<template>
  <div class="card bg-base-100 shadow">
    <figure>
      <img :src="product.image" />
    </figure>

    <div class="card-body">
      <h2 class="card-title">
        {{ product.name }}
      </h2>

      <p>${{ product.price }}</p>

      <div class="card-actions justify-between">
        <RouterLink
          :to="`/product/${product.id}`"
          class="btn btn-outline btn-sm"
        >
          View
        </RouterLink>

        <button
          type="button"
          class="btn btn-primary btn-sm"
          @click.stop.prevent="cartStore.addToCart(product)"
          :disabled="product.stock === 0"
        >
          {{ product.stock === 0 ? "Out of Stock" : "Add to Cart" }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import { useProductStore } from "@/stores/productStore";
import ProductCard from "@/components/ProductCard.vue";

const productStore = useProductStore();

onMounted(() => {
  productStore.fetchProducts();
});
</script>

<template>
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Featured Products</h1>

    <div v-if="productStore.loading">Loading products...</div>

    <div v-if="productStore.error">Error loading products</div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <ProductCard
        v-for="product in productStore.products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

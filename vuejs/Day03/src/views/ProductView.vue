<script setup>
import { onMounted, computed, watch, ref } from "vue";
import { useRoute } from "vue-router";
import { useProductStore } from "@/stores/productStore";
import ProductDetails from "@/components/ProductDetails.vue";
import ProductCard from "@/components/ProductCard.vue";

const route = useRoute();
const productStore = useProductStore();

onMounted(async () => {
  if (productStore.products.length === 0) {
    await productStore.fetchProducts();
  }
});
const product = computed(() => {
  const routeId = String(route.params.id); 
  
  return productStore.products.find((p) => String(p.id) === routeId);
});

const relatedProducts = computed(() => {
  const routeId = String(route.params.id);
  
  return productStore.products.filter((p) => String(p.id) !== routeId);
});


</script>

<template>
  <div class="max-w-6xl mx-auto p-6">
    <div v-if="productStore.loading" class="text-center py-10">
      <span class="loading loading-spinner loading-lg"></span>
      <p>Loading products...</p>
    </div>

    <div v-else-if="product">
      <ProductDetails :product="product" />
      
      <h2 class="text-2xl font-bold mt-10 mb-4">Related Products</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <ProductCard v-for="p in relatedProducts" :key="p.id" :product="p" />
      </div>
    </div>

    <div v-else class="alert alert-error">
      <p>Product not found! ID: {{ route.params.id }}</p>
      <p>Total products in store: {{ productStore.products.length }}</p>
    </div>
  </div>
</template>
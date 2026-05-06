<script setup>
import { onMounted, onUnmounted } from "vue";
import CarouselBanner from "@/components/CarouselBanner.vue";
import ProductCard from "@/components/ProductCard.vue";

defineProps(["products"]);

onMounted(() => {
  console.log("HomeView mounted");
});
onUnmounted(() => {
  console.log("HomeView unmounted");
});
</script>

<template>
  <div class="max-w-7xl mx-auto p-6">
    <CarouselBanner />

    <h2 class="text-3xl font-bold mb-6">Featured Products</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <ProductCard
        v-for="product in products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

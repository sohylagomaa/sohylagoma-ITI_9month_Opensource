<script setup>
import { useRoute } from "vue-router";
import { computed, onMounted, onUnmounted } from "vue";
import ProductDetails from "@/components/ProductDetails.vue";
import ProductCard from "@/components/ProductCard.vue";

const route = useRoute();

const props = defineProps(["products"]);

const product = computed(() => {
  return props.products.find((p) => p.id == route.params.id);
});

const relatedProducts = computed(() => {
  return props.products.filter((p) => p.id != route.params.id);
});

onMounted(() => {
  console.log("ProductView mounted for ID:", route.params.id);
});

onUnmounted(() => {
  console.log("ProductView unmounted");
});
</script>
<template>
  <div class="max-w-7xl mx-auto p-6">
    <ProductDetails :product="product" @buy="$emit('buy', $event)" />

    <h2 class="text-2xl font-bold mt-10 mb-6">Related Products</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <ProductCard
        v-for="item in relatedProducts"
        :key="item.id"
        :product="item"
      />
    </div>
  </div>
</template>

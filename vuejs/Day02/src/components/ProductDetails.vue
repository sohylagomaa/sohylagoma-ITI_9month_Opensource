<script setup>
import { computed, onMounted, onUnmounted } from "vue";

const props = defineProps(["product"]);

const emit = defineEmits(["buy"]);

const discountedPrice = computed(() => {
  return (
    props.product.price - (props.product.price * props.product.discount) / 100
  );
});

const buy = () => {
  emit("buy", props.product.id);
};

onMounted(() => {
  console.log("ProductDetails mounted");
});

onUnmounted(() => {
  console.log("ProductDetails unmounted");
});
</script>

<template>
  <div class="card lg:card-side bg-base-100 shadow-xl p-6">
    <figure class="lg:w-1/2">
      <img :src="product.image" class="rounded-xl" />
    </figure>

    <div class="card-body">
      <h1 class="text-3xl font-bold">
        {{ product.name }}

        <span v-if="product.badge" class="badge badge-accent ml-3">
          {{ product.badge }}
        </span>
      </h1>

      <p class="text-gray-500">
        {{ product.description }}
      </p>

      <div class="text-2xl font-bold mt-4">
        <span class="text-primary"> ${{ discountedPrice }} </span>

        <span
          v-if="product.discount > 0"
          class="line-through text-gray-400 ml-2 text-lg"
        >
          ${{ product.price }}
        </span>
      </div>

      <div class="flex flex-wrap gap-2 mt-4">
        <span
          v-for="tag in product.tags"
          :key="tag"
          class="badge badge-outline"
        >
          {{ tag }}
        </span>
      </div>

      <div class="mt-6">
        <button
          @click="buy"
          :disabled="product.stock === 0"
          class="btn btn-primary"
        >
          {{ product.stock === 0 ? "Out of Stock" : "Buy Now" }}
        </button>
      </div>

      <p class="text-sm text-gray-400 mt-2">Stock: {{ product.stock }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";

const product = ref({
  id: 1,
  name: "Cozy Sneakers",
  description: "High-quality sneakers that go with everything you wear.",
  image:
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtg7Vh8ImRp9QCB0X3ud2W9SM1mmL9BN5mGA&s",
  badge: "NEW",
  price: 120,
  discount: 20,
  tags: ["Fashion", "Casual", "Sport"],
});

const relatedProducts = ref([
  {
    id: 2,
    name: "Running Shoes",
    price: 90,
    discount: 10,
    image: "https://m.media-amazon.com/images/I/81MNskqdPZL._AC_UY1000_.jpg",
  },
  {
    id: 3,
    name: "Casual Boots",
    price: 150,
    discount: 0,
    image: "https://m.media-amazon.com/images/I/81MNskqdPZL._AC_UY1000_.jpg",
  },
  {
    id: 4,
    name: "Flip Flops",
    price: 30,
    discount: 50,
    image: "https://m.media-amazon.com/images/I/81MNskqdPZL._AC_UY1000_.jpg",
  },
]);

const discountedPrice = computed(() => {
  return (
    product.value.price - (product.value.price * product.value.discount) / 100
  );
});

const getDiscountedPrice = (item) => {
  return item.price - (item.price * item.discount) / 100;
};
</script>

<template>
  <div class="max-w-6xl mx-auto p-6 space-y-10">
    <!-- Main Product -->
    <div class="card lg:card-side bg-base-100 shadow-xl p-6">
      <figure class="w-full lg:w-1/3">
        <img :src="product.image" class="rounded-xl object-cover" />
      </figure>
      <div class="card-body">
        <!-- Badge -->
        <div v-if="product.badge">
          <span
            class="badge"
            :class="product.discount > 0 ? 'badge-error' : 'badge-success'"
          >
            {{ product.badge }}
          </span>
        </div>
        <h2 class="card-title text-3xl">
          {{ product.name }}
        </h2>
        <p class="text-gray-500">
          {{ product.description }}
        </p>
        <!-- Price -->
        <div class="text-2xl font-bold mt-2">
          <span class="text-primary"> ${{ discountedPrice }} </span>
          <span
            v-if="product.discount > 0"
            class="line-through text-gray-400 ml-3 text-lg"
          >
            ${{ product.price }}
          </span>
        </div>
        <!-- Tags -->
        <div class="mt-4 flex flex-wrap gap-2">
          <span
            v-for="tag in product.tags"
            :key="tag"
            class="badge badge-outline"
          >
            {{ tag }}
          </span>
        </div>
      </div>
    </div>
    <!-- Related Products -->
    <div>
      <h2 class="text-2xl font-bold mb-6">Related Products</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div
          v-for="item in relatedProducts"
          :key="item.id"
          class="card bg-base-100 shadow-md hover:shadow-xl transition"
        >
          <figure class="p-4">
            <img :src="item.image" class="rounded-xl" />
          </figure>
          <div class="card-body items-center text-center">
            <h3 class="font-semibold text-lg">
              {{ item.name }}
            </h3>

            <div class="font-bold">
              <span class="text-primary">
                ${{ getDiscountedPrice(item) }}
              </span>

              <span
                v-if="item.discount > 0"
                class="line-through text-gray-400 ml-2"
              >
                ${{ item.price }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>

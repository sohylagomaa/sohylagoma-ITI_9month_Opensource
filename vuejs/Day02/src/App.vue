<script setup>
import { ref } from "vue";
import NavBar from "./components/NavBar.vue";

const products = ref([
  {
    id: 1,
    name: "Cozy Sneakers",
    description: "High-quality sneakers that go with everything you wear.",
    image:
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Ozzdn3VqlP1-qBHZQ6VF9gH1JJAg2Sq-uQ&s",
    badge: "NEW",
    price: 120,
    discount: 20,
    stock: 10,
    tags: ["Fashion", "Casual", "Sport"],
  },
  {
    id: 2,
    name: "Running Shoes",
    description: "Built for speed and comfort on any terrain.",
    image:
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLHBeVQDPqPdK9MwuK6YMl5Y63vJvEEnH5rg&s",
    badge: "",
    price: 90,
    discount: 10,
    stock: 5,
    tags: ["Sport", "Running"],
  },
  {
    "id": 3,
    "name": "Casual Boots",
    "description": "Rugged boots for everyday adventures.",
    "image": "https://media.istockphoto.com/id/1688015574/photo/white-sneaker-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=gz8bGn7h_eaF4uJGJjdZYYhJDrrigHAygo2Vi8tZjH8=",
    "badge": "SALE",
    "price": 150,
    "discount": 0,
    "stock": 8,
    "tags": ["Casual", "Winter"]
  },
  {
    "id": 4,
    "name": "Flip Flops",
    "description": "Light and breezy for sunny days.",
    "image": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyvNLKSt8u-YYreufWQKyb4ROhT4C5DF5dVQ&s",
    "badge": "",
    "price": 30,
    "discount": 50,
    "stock": 20,
    "tags": ["Summer", "Casual"]
  }
]);

const buyProduct = (id) => {
  const product = products.value.find((p) => p.id === id);
  if (product && product.stock > 0) {
    product.stock--;
  }
};
</script>

<template>
  <NavBar />
  <router-view :products="products" @buy="buyProduct" />
</template>

<style scoped></style>

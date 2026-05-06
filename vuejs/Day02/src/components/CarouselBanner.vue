<script setup>
import { onMounted, onUnmounted } from "vue";

onMounted(() => {
  console.log("CarouselBanner mounted");
});

onUnmounted(() => {
  console.log("CarouselBanner unmounted");
});
</script>

<template>
  <div class="carousel w-full rounded-xl mb-10 shadow-lg ">
    <div id="slide1" class="carousel-item relative w-full ">
      <img
        src="https://img.freepik.com/free-vector/gradient-instagram-shop-logo-template_23-2149704603.jpg?semt=ais_rp_progressive&w=740&q=80"
        class="w-full "
      />
    </div>

    <div id="slide2" class="carousel-item relative w-full">
      <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeCUgr6LesIXIuBOsOciQu4uzTCEmS8K-JgQ&s"
        class="w-full"
      />
    </div>

    <div id="slide3" class="carousel-item relative w-full">
      <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSszk440nNdOB2x4SlcIdj6CB9fM8iWmUZU9g&s"
        class="w-full"
      />
    </div>
  </div>
</template>

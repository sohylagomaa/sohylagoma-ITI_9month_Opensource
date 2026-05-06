<script setup>
import NavBar from "./components/NavBar.vue";
</script>

<template>
  <NavBar />

  <router-view :key="$route.fullPath"/>
</template>

<style scoped></style>

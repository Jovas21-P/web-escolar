<script setup>
import Navbar from './components/Navbar.vue'
</script>

<template>
  <header class="">
    <Navbar />
  </header>
  <main class="" style="padding-top: 80px;">
    <RouterView />
  </main>
</template>

<style scoped>
</style>

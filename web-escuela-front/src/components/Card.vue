<script setup>
defineProps({
  titulo: String,
  texto: String,
  icono: String,
  link: String
})
</script>

<template>
  <div class="card shadow-card" style="width: 18rem;">
  <a :href="link" class="text-decoration-none text-center" target="_blank"><i :class="icono"></i></a>
  <div class="card-body">
    <h3 class="card-title text-center">{{ titulo }}</h3>
    <p class="card-text text-center">{{ texto }}</p>
  </div>
</div>
</template>

<style scoped>
  a {
  font-size: 200px;
  color: #4CAF50;
  transition: all 0.2s ease;
  text-shadow: 2px 2px 5px rgba(76, 175, 80, 0.5); /* sombra verde suave */
}
  a:hover {
  color: #267e29;
  scale: 1.1;
  text-shadow: 3px 3px 8px rgba(38, 126, 41, 0.8); /* sombra más fuerte en hover */
}

.shadow-card {
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
  transition: all 0.2s ease;

}
.shadow-card:hover {
  scale: 1.1;
}
.shadow-card:active {
  scale: 1;
}

</style>
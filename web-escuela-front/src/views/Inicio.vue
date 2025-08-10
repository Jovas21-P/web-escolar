<script setup>
import Card from '../components/Card.vue'
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="imagen-presentacion d-flex justify-content-center w-100 flex-column position-relative">
        <img
          src="https://imgs.search.brave.com/UnJwVngF2_Mzc2n0OxjgJLJ3DBID7Ea-IU8EoaV5A2o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9kcmFn/b25lcy51dGZ2LmVk/dS5teC93cC1jb250/ZW50L3VwbG9hZHMv/MjAxOS8wMy9tYXNj/b3RhLXktbG9nby5w/bmc"
          alt="Universidad Tecnológica Fidel Velázquez"
          style="filter: blur(2px); width: 100%; height: auto;"
        />

        <img
          src="https://imgs.search.brave.com/sE3xY0NByyAbeSCjYUU7TxCODUtf6lKGB2nyRWNn69U/rs:fit:860:0:0:0/g:ce/aHR0cDovL2Nhc2F1/dGZ2Lm5ldC93ZWIv/aW1hZ2UvMjU2MC9s/b2dvLnBuZw"
          alt="Logo utfv"
          style="position: absolute; inset: 0; margin: auto;"
        />

        <div
          class="w-75 d-flex justify-content-center align-items-center rounded position-absolute start-50 translate-middle bg-white p-3 shadow text-center"
          style="top: 63%;"
        >
          <h1 class="m-0 fw-bold">Universidad Tecnológica Fidel Velázquez</h1>
        </div>
      </div>
    </div>

    <!-- Tarjetas -->
    <div class="row g-5 justify-content-center">
      <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <Card
          titulo="Admisiones"
          texto="Aquí encontraras las listas con los horarios y grupos asignados"
          icono="bi bi-journal-text"
          link="https://utfv.edomex.gob.mx/admision"
        />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <Card
          titulo="Titulación"
          texto="Los requisitos y trámites para titularte los encuentras en esta liga"
          icono="bi bi-trophy"
          link="https://utfv.edomex.gob.mx/titulacion"
        />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <Card
          titulo="Dragones UTFV"
          texto="Da click en la imagen para ver el video"
          icono="bi bi-play"
          link="https://www.youtube.com/watch?v=lddw8k5GdDA"
        />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <Card
          titulo="Certificación de competencias"
          texto="La Entidad de Certificación te da la más cordial bienvenida"
          icono="bi bi-award"
          link="https://utfv.edomex.gob.mx/entidad-certificacion-evaluacion"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
.imagen-presentacion img {
  max-width: 100%;
  display: block;
}
</style>

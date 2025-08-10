<script setup>
import Card from '../components/Card.vue';
import { verificarSesion, user } from '../services/Usuario';
import { onMounted } from 'vue';

onMounted(() => {
  verificarSesion()
})
</script>

<template>
  <div class="container" style="height: 170vh;">
    <div class="title mb-5 text-center">
      <h1>Bienvenido {{ user.nombres }}</h1>
    </div>
    <div class="row g-5">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <Card 
          titulo="Calendario"
          texto="Aquí encontraras el calendario escolar"
          icono="bi bi-calendar"
        />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <Card
          titulo="Calificaciones"
          texto="Aquí encontraras tus calificaciones"
          icono="bi bi-journal-text"
        />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card shadow-card" style="width: 18rem;">
        <RouterLink to="/perfil-alumno" class="text-decoration-none text-center"><i class="bi bi-person-lines-fill"></i></RouterLink>
        <div class="card-body">
          <h3 class="card-title text-center">Mi perfil</h3>
          <p class="card-text text-center">Aquí encontraras tus datos personales</p>
        </div>
      </div>
      </div>
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
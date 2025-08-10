<script setup>
import Card from '../components/Card.vue';
import { verificarSesion, user, isAuthenticated } from '../services/Usuario';
import { onMounted, computed } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

onMounted(() => {
  verificarSesion();
});

const usuario = computed(() => user.value || {});

function cerrarSesion() {
  // Borra el token y cambia estado
  localStorage.removeItem('token');
  isAuthenticated.value = false;
  user.value = null;
  // Opcional: redirige a la página de login
  router.push('/inicio-sesion');
}
</script>

<template>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Información del Usuario</h2>

    <div class="card shadow p-4">
      <div class="row mb-3">
        <div class="col-sm-4 fw-bold">Matrícula:</div>
        <div class="col-sm-8">{{ usuario.matricula }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-4 fw-bold">Nombres:</div>
        <div class="col-sm-8">{{ usuario.nombres }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-4 fw-bold">Apellidos:</div>
        <div class="col-sm-8">{{ usuario.apellidos }}</div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-4 fw-bold">Correo:</div>
        <div class="col-sm-8">{{ usuario.correo }}</div>
      </div>

      <div class="text-center mt-4">
        <button class="btn btn-danger" @click="cerrarSesion">Cerrar Sesión</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  max-width: 600px;
  margin: auto;
  background-color: #fff;
}
</style>

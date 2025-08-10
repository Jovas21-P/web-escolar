<script setup>
import { onMounted, onBeforeUnmount, ref } from 'vue'
import { RouterLink } from 'vue-router'
import { isAuthenticated, verificarSesion } from '../services/Usuario.js'  // importa desde donde guardes el archivo

const isHidden = ref(false)
let lastScroll = 0

function handleScroll() {
  const currentScroll = window.scrollY
  const diff = currentScroll - lastScroll

  if (diff > 50) {
    isHidden.value = true
    lastScroll = currentScroll
  } else if (diff < -50) {
    isHidden.value = false
    lastScroll = currentScroll
  }
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
  verificarSesion()
})

onBeforeUnmount(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
  <nav :class="['navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 transition z-1', { 'hide-navbar': isHidden }]">
    <div class="container-fluid">
      <img
        src="http://www.casautfv.net/web/image/website/1/logo/Universidad%20Tecnol%C3%B3gica%20Fidel%20Vel%C3%A1zquez?unique=8acb22b"
        alt="escuela"
        height="50"
      />
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
        <ul class="navbar-nav d-flex gap-3 align-items-center">
          <li class="nav-item">
            <RouterLink class="nav-link" to="/">Inicio</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/about">Acerca de la universidad</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/alumnos">Alumnos</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/docentes">Docentes</RouterLink>
          </li>
          <li class="nav-item" v-if="!isAuthenticated">
            <RouterLink class="nav-link" to="/inicio-sesion">Iniciar Sesión</RouterLink>
          </li>
          <li class="nav-item" v-else>
            <RouterLink class="nav-link" to="/perfil"><i class="bi bi-person-circle" style="font-size: 25px;"></i></RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
/* tu CSS */
</style>

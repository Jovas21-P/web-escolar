import { createMemoryHistory, createRouter, createWebHistory } from 'vue-router'

import Inicio from '../views/Inicio.vue'
import About from '../views/About.vue'
import Alumnos from '../views/Alumnos.vue'
import Docentes from '../views/Docentes.vue'
import IniciarSesion from '../views/IniciarSesion.vue'
import RegistrarUsuario from '../views/RegistrarUsuario.vue'
import PerfilAlumnos from '../views/PerfilAlumnos.vue'
import PerfilA from '../views/PerfilA.vue'

const routes = [
  { path: '/', component: Inicio },
  { path: '/about', component: About },
  { path: '/alumnos', component: Alumnos },
  { path: '/docentes', component: Docentes },
  { path: '/inicio-sesion', component: IniciarSesion },
  { path: '/registro', component:  RegistrarUsuario},
  { path: '/perfil', component: PerfilAlumnos},
  { path: '/perfil-alumno', component: PerfilA},
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
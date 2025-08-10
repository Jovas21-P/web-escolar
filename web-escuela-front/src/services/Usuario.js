const URL = import.meta.env.VITE_URL_BACKEND

import { ref } from 'vue'

export const isAuthenticated = ref(false)
export const user = ref(null)

export function iniciarSesion(correo, contrasena) {
  return fetch(`${URL}/api/iniciar-sesion`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    // credentials: 'include', // Solo si usas cookies, pero aquí usas token en header
    body: JSON.stringify({
      correo: correo,
      contrasena: contrasena
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'ok' && data.token) {
      localStorage.setItem('token', data.token)
      Swal.fire({
    title: `Bienvenido ${data.mensaje}`,
    icon: "success",
  }).then(() => {
    setTimeout(() => {
      location.reload();
    }, 2500);
  })
      
      
    }
    return data;
  });
}

export function registrarSesion(correo, contrasena) {
  return fetch(`${URL}/api/crear-usuario`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      correo: correo,
      contrasena: contrasena
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });
}

// en services/Usuario.js o donde tengas la función
let sesionVerificada = false;

export function verificarSesion() {
  if (sesionVerificada) {
    console.log('verificarSesion: Ya se verificó antes, no se vuelve a ejecutar.');
    return;
  }

  sesionVerificada = true; 
  console.log('verificarSesion: Ejecutando verificación de sesión por primera vez.');

  const token = localStorage.getItem('token');
  if (!token) {
    console.log('verificarSesion: No hay token en localStorage, usuario no autenticado.');
    isAuthenticated.value = false;
    return;
  }

  fetch(`${URL}/api/auth/check`, {
    headers: {
      'Authorization': `Bearer ${token}`,
      'Accept': 'application/json'
    }
  })
  .then(res => {
    console.log(`verificarSesion: Respuesta HTTP ${res.status} ${res.statusText}`);
    if (res.status === 401) {
      console.log('verificarSesion: Token inválido o expirado.');
      isAuthenticated.value = false;
      return null;
    }
    return res.json();
  })
  .then(data => {
    if (data && data.authenticated) {
      console.log('verificarSesion: Usuario autenticado:', data.user);
      isAuthenticated.value = true;
      user.value = data.user;
    } else {
      console.log('verificarSesion: No autenticado o datos inválidos.');
      isAuthenticated.value = false;
      localStorage.removeItem('token');
    }
  })
  .catch(err => {
    console.error('verificarSesion: Error verificando sesión:', err);
    isAuthenticated.value = false;
  });
}



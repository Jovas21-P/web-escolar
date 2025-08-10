<script setup>
import { reactive } from 'vue';
import { iniciarSesion } from '../services/Usuario';
import { useRouter } from 'vue-router'

const router = useRouter();

  const inputs = reactive({
    correo: '',
    contrasena: ''
  })

function alerta() {
  console.log(inputs);
  iniciarSesion(inputs.correo, inputs.contrasena)
    .then(data => {
      console.log(data);
      if (data.status == "error") {
        Swal.fire({
          title: "Error",
          icon: "error",
          text: data.mensaje,
        });
      } else {
        Swal.fire({
          title: "Bienvenido",
          icon: "success",
          text: data.mensaje,
          timer: 2500,
          timerProgressBar: true,
          showConfirmButton: false,
        }).then(() => {
          router.push('/perfil');
        });
      }
    })
    .catch(error => {
      console.error(error);
      alert('Error al iniciar sesión');
    });
}

</script>

<template>
  <div class="container">
  <div class="card">
  <div class="card-body d-flex flex-column align-items-center">
    <div class="in-1 mb-3 w-50 position-relative g-3">
      <input v-model="inputs.correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder=" "></input>
      <label for="exampleFormControlInput1" class="form-label label-flotante">Correo</label>
    </div>
    <div class="in-2 mb-3 w-50">
      <input v-model="inputs.contrasena" type="password" class="form-control" id="exampleFormControlInput2" placeholder=" "></input>
      <label for="exampleFormControlInput2" class="form-label label-flotante">Contraseña</label>
    </div>
    <div class="btn d-flex justify-content-center">
      <button @click="alerta" type="button" class="btn btn-success">Iniciar Sesion</button>
    </div>
  </div>
</div>
</div>
</template>
  
<style scoped>
input {
  border: none;
  border-bottom: 1px solid #ccc;
  border-radius: 0;
  transition: all .2s ease;
}
input:focus {
  outline: none;
  box-shadow: none;
  border-bottom: 1px solid #4CAF50;

}

.in-1, .in-2 {
  position: relative;
}

.label-flotante {
  position: absolute;
  left: 12px;
  bottom: -1px;
  color: #888;
  pointer-events: none;
  transition: all 0.3s ease;
  font-size: 16px;
}

input:focus + .label-flotante,
input:not(:placeholder-shown) + .label-flotante {
  transform: translateY(-22px);
  font-size: 12px;
  color: #4CAF50;
}

button {
  transition: all 0.2s ease;
}
button:hover {
  scale: 1.1;
}
button:active {
  scale: 1;
}
</style>

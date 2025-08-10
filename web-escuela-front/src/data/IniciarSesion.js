function IniciarSesion(correo, contrasena, API_URL) {
  let datos
  return fetch(API_URL, {
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
    datos = data
  }) 
  return datos
}
// Get the form
const form = document.querySelector('#buttonlogin');

function verifyLogin(param) {

  const id = document.querySelector('#usuario');
  const password = document.querySelector('#password');

  const errorMessages = [];

  if (id.value === '') {
    errorMessages.push('Introduzca un nombre de usuario');
  }

  if (password.value === '') {
    errorMessages.push('Introduzca una contraseña');
  }

  const errorDiv = document.querySelector('#errorDiv');

  if (errorMessages.length > 0) {
    errorDiv.classList.remove('d-none');
    errorDiv.innerHTML = '<strong>Error:</strong><br>' + errorMessages.join('<br>');
  } else {
    errorDiv.classList.add('d-none');
    buscarUsuarios(null, null, "buscarUsuarios", "login");
  }
}
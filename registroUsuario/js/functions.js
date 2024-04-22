let formulario = document.getElementById("formulario");
//Todos los input text
let inputTexts = document.getElementsByClassName("textInput");
// Todas los divs frases error:
let fraseError = document.getElementsByClassName("error");
// Todos los failure-icon
let failureIcon = document.getElementsByClassName("failure-icon");
// Todos los succes-icon
let successIcon = document.getElementsByClassName("success-icon");

//Validación de no empty en los inputs obligatorios
function noEmpty(elemento, index) {
  let error = false;
  if (elemento.value.trim().length == 0) {
    success(elemento, index);
    error = true;
  } else {
    errorActive(elemento, index);
    error = false;
  }
  return error;
}

//Activar succes
function success(elemento, index) {
  //añadir frase error a traves del index
  fraseError[index].innerHTML = "Campo obligatorio";

  //añadir icono rojo
  successIcon[index].style.opacity = 0;
  failureIcon[index].style.opacity = 1;

  //añadir linea roja al input
  elemento.style.border = "2px solid red";
}

//Activar error
function errorActive(elemento, index) {
  //añadir icono verde
  failureIcon[index].style.opacity = 0;
  successIcon[index].style.opacity = 1;
  //añadir linea roja al input
  elemento.style.border = "2px solid green";
}

//añadir verificación con la interacción del usuario
for (let index = 0; index < inputTexts.length; index++) {
  const elemento = inputTexts[index];
  elemento.addEventListener("change", () => {
    noEmpty(elemento, index);
  });
}

formulario.addEventListener("submit", (event) => {
  event.preventDefault();

  // let nombre = document.getElementById("nombreDeUsuario");
  // let nombreError = document.getElementById("errorNombre");
  // let onlyLetters = /^[A-Za-z]+$/;

  // let correo = document.getElementById("correoElectronico");
  // let correoError = document.getElementById("correoError");
  // let onlyMail =
  //   /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  // let contrasena = document.getElementById("contrasena");
  // let contrasenaError = document.getElementById("contrasenaError");

  // let contrasenaValidar = document.getElementById("contrasenaValidar");
  // let contrasenaValidarError = document.getElementById(
  //   "contrasenaValidarError"
  // );
  // let onlyContrasena =
  //   /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;

  // // validar campo NOMBRE
  // if (!onlyLetters.test(nombre)) {
  //   nombreError.innerHTML = "Solo puede contener letras";
  //   cambiarIcono();
  // } else {
  //   nombreError.innerHTML = "";
  // }
  // // validar campo CORREO
  // if (correo.length == 0) {
  //   correoError.innerHTML = "Campo obligatorio";
  // } else if (!onlyMail.test(correo)) {
  //   correoError.innerHTML = "Tiene que proporcionar un email valido";
  // } else {
  //   correoError.innerHTML = "";
  // }
  // // validar campo Contraseña
  // if (contrasena.length == 0) {
  //   contrasenaError.innerHTML = "Campo obligatorio";
  // } else if (!onlyContrasena.test(contrasena)) {
  //   contrasenaError.innerHTML =
  //     "La contraseña debe contener mínim 6: min: 1 majúscules, minúscules, caràcters especials:@#=";
  // } else {
  //   contrasenaError.innerHTML = "";
  // }
  // // validar campo REPETIR Contraseña
  // if (contrasenaValidar.length == 0) {
  //   contrasenaValidarError.innerHTML = "Campo obligatorio";
  // } else if (!(contrasena == contrasenaValidar)) {
  //   contrasenaValidarError.innerHTML = "La contraseña debe coincidir";
  // } else {
  //   contrasenaValidarError.innerHTML = "";
  // }

  // Todos los Inputs
  for (let index = 0; index < inputTexts.length; index++) {
    const elemento = inputTexts[index];

    if (noEmpty(elemento, index)) {
      error = true;
    }
  }
  if (!error) {
    alert("OK");
    formulario.submit();
  }
});

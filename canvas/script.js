// Obtener el lienzo
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
var currentColor;

// Variables para guardar la posición del ratón
var isDrawing = false;
var lastX = 0;
var lastY = 0;

// Evento de ratón: comienzo del dibujo
canvas.addEventListener("mousedown", function (e) {
  isDrawing = true;
  lastX = e.offsetX;
  lastY = e.offsetY;
});

// Evento de ratón: movimiento durante el dibujo
canvas.addEventListener("mousemove", function (e) {
  if (isDrawing) {
    var currentX = e.offsetX;
    var currentY = e.offsetY;

    // Dibujar una línea desde la posición anterior a la actual
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(currentX, currentY);
    ctx.strokeStyle = currentColor;
    ctx.stroke();

    // Actualizar la posición anterior con la posición actual
    lastX = currentX;
    lastY = currentY;
  }
});

// Evento de ratón: fin del dibujo
canvas.addEventListener("mouseup", function () {
  isDrawing = false;
});

// Añadir colores
let red = document.getElementById("red");
let green = document.getElementById("green");
let black = document.getElementById("black");

red.addEventListener("click", () => {
  currentColor = "red";
});

green.addEventListener("click", () => {
  currentColor = "green";
});

black.addEventListener("click", () => {
  currentColor = "black";
});

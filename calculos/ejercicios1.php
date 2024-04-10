<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
<h1>PHP 1</h1>
<h3>Ejercicio 5</h3>
<p>
<?php 
function suma ($x, $y)
{
$x+$y;
}
$a=1;
$b=2;
$c=suma($a, $b);
print $c;
?> 
</p>

<h3>Ejercicio 6</h3>
<?php 

$cadena = "Estamos buscando la repetición de caracteres en este string.";
//count_chars — Devuelve información sobre los caracteres usados en una cadena
function letraRepetida($cadena) {
    $cadSinEspacios = str_split($cadena);
    $cadArray = str_replace(' ', '', $cadSinEspacios);

};


?>


  </body>
</html>

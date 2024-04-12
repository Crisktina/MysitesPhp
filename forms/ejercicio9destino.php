<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino</title>
</head>
<?php
$saludo = $nombre = "";
$saludo = $_GET['saludo'];

$nombre = $_GET['nombre'];

echo "Variable saludo: <br>";
echo $saludo;
echo "<br><br>";
echo "Variable nombre: <br>";
echo $nombre;
?>
</body>
</html>
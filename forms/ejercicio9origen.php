<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Origen</title>
</head>
<body>
<body>
    
<?php
$nombre ="";

if(isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
}  

$saludo = $nombre2 = "";

if (isset($_GET['saludo']) && isset($_GET['nombre'])) {
    $saludo = $_GET['saludo'];
    $nombre2 = $_GET['nombre'];
}


?>
<nav>
    <a href="ejercicio9destino.php?saludo=Hola&nombre=<?php echo $nombre?>">
    Paso variables saludo y nombre a la página destino</a> <br><br>
    <a href="ejercicio9origen.php?saludo=Hola&nombre=<?php echo $nombre?>">
    Paso variables saludo y nombre a esta misma página</a>
</nav> <br><br><br>

<form method="post">
    <label for="nombre">Introduce tu nombre</label> <br>
    <input type="text" name="nombre"><br><br>
    <input type="submit" value="Guardar nombre">
</form>


<h1><?php
echo $saludo;
echo " ";
echo $nombre2;
?></h1>
</body>
</html>
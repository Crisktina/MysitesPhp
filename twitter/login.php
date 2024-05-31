<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Twitter</title>
</head>
<?php 
require_once "./data/conexion_ddbb.php";

if($conexion){
    //consulta de datos
    $consulta = "SELECT * FROM mensajes";
    $result = $conexion -> query($consulta);
    //print_r($result);

    $arr = [];
    // Array asociativo
    while ($fila = $result -> fetch_array(MYSQLI_ASSOC)) {
    $arr[]=$fila;
    }
    //print_r( $arr);

    require_once "./data/close_conexion_ddbb.php";
}

?>
<body>
<div class="containerLogin">
    <div class="form">
        <form action=""></form>
      <input type="text" placeholder="Nombre de usuario">
      <input type="text" placeholder="Buscar amigos..."> <button class="button" type="submit"><img  src="./img/search.svg" alt="buscar"></button>
    </div>
</div>
    
</body>
</html>
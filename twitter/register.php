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
    <form class="formLogin" method="post">
        <h2>Registro</h2>
      <input type="text" placeholder="Nombre de usuario">
      <input type="text" placeholder="Nickname">
      <input type="date" placeholder="Año de nacimiento">
      <input type="email" placeholder="Email">
      <input type="password" placeholder="Password"> 
      <input type="password" placeholder="Confirmar password"> 
      <button class="button btnForm" type="submit">Enviar</button>
    </form>
</div>
    
</body>
</html>
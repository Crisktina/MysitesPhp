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
<div class="container">
  <div class="header">
    <div>
      <a href="index.php"><img class="logo" src="./img/twitter.png" alt="logo"></a>
      <a href="login.php"><button type="button" class="button">Log out</button></a>
    </div>
    <div class="line"></div>
  </div>
  <div class="navbar">
    <div>
      <input type="text" placeholder="Enviar mensaje..."> <button class="button" type="submit"><img src="./img/envelopeWhite.svg" alt="buscar"></button>
    </div>
    <div>
      <input type="text" placeholder="Buscar mensajes..."> <button class="button" type="submit"><img src="./img/search.svg" alt="buscar"></button>
    </div>
  </div>
  <div class="content">
    <div class="cardMessage">
      <div class="cabeceraCard"><img class="icon" src="./img/envelope.svg" alt="mensaje">
      <h3>User123</h3></div>
      <p><strong class="comillas">" </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<strong class="comillas"> "</strong></p>
    </div>
  </div>
  <div class="side-bar">
    <div>
      <input class="inputSuscriptores" type="text" placeholder="Buscar amigos..."> <button class="button" type="submit"><img  src="./img/search.svg" alt="buscar"></button>
    </div>
    <div>
      <div class="cardUser">
        <div class="boxIconUser"><img class="iconUser" src="./img/user.svg" alt="mensaje">
        </div>
        <h3 id="userName">User123</h3>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="line"></div>
    <p>Copyright &copy;</p>
  </div>
</div>
    
</body>
</html>
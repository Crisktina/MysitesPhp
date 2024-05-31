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
    //consulta de mensajes + nombre usuario
    $consulta = "SELECT m.id AS id_mensaje, m.fecha_ingreso, m.texto_mensaje, m.id_user, u.nombre  FROM mensajes m JOIN users u ON m.id_user = u.id;";
    $result = $conexion -> query($consulta);

    //print_r($result);

    // Array mensajes
    $arrMensajes = [];
    while ($fila = $result -> fetch_array(MYSQLI_ASSOC)) {
    $arrMensajes[]=$fila;
    }
    //print_r( $arrMensajes);

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
    <?php foreach ($arrMensajes as $key => $value) { ?>
    <div class="cardMessage">
      <div class="cabeceraCard">
        <div>
          <img class="icon" src="./img/envelope.svg" alt="mensaje">
          <h3><?=$value['nombre'];?></h3>
        </div> 
        <h4><?=$value['fecha_ingreso'];?></h4></div>
        <p><strong class="comillas">" </strong><?=$value['texto_mensaje'];?><strong class="comillas"> "</strong></p>
    </div>
    <?php } ?>
  </div>
  <div class="side-bar tabs">
        <div class="tab-container">
          <div id="tab2" class="tab">
            <a href="#tab2">Usuarios</a>
            <div class="tab-content">
              <div class="buscarUser">
                <form id="formSuscriptores" method="post">
                  <input class="inputSuscriptores" type="text" placeholder="Buscar amigos...">
                  <button class="button" type="submit"><img  src="./img/search.svg" alt="buscar"></button>
                </form>
              </div>
              <div>
                <div class="cardUser">
                  <div class="boxIconUser">
                    <img class="iconUser" src="./img/user.svg" alt="mensaje">
                  </div>
                  <h3 id="userName">User2</h3>
                </div>
              </div>
            </div>
          </div> 
          <div id="tab1" class="tab">
            <a href="#tab1">Amigos</a>
            <div class="tab-content">
              <div class="buscarUser">
                <form id="formSuscriptores" method="post">
                  <input class="inputSuscriptores" type="text" placeholder="Buscar amigos...">
                  <button class="button" type="submit"><img  src="./img/search.svg" alt="buscar"></button>
                </form>
              </div>
            <div>
            <div class="cardUser">
              <div class="boxIconUser">
                <img class="iconUser" src="./img/user.svg" alt="mensaje">
              </div>
              <h3 id="userName">User1</h3>
            </div>
          </div>
        </div> 
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
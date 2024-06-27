<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20,600,0,0" />
    <title>Maps</title>
</head>
<?php 

require_once "./data/conexion_ddbb.php";

if($conexion){


    //consulta usuarios
    $consulta = "SELECT u.id AS id_user, u.nickname FROM users u";
    $result = $conexion -> query($consulta);
    // Array usuarios
    $arrUsers = [];
    while ($fila = $result -> fetch_array(MYSQLI_ASSOC)) {$arrUsers[]=$fila;}

   


    require_once "./data/close_conexion_ddbb.php";
}

?>
<body>
<div class="container">
  <div class="header">
    <div>
      <a href="index.php"><img class="logo" src="./img/twitter.png" alt="logo"></a>
      <a href="login.php">
        <button type="button" class="button">
          <span class="material-symbols-rounded" style="color: white; font-size:18px;">logout</span>
        </button>
      </a>
    </div>
    <div class="line"></div>
  </div>
  <div class="navbar">
    <div>
      <input type="text" placeholder="Buscar imagenes..."> <button class="button" type="submit"><img src="./img/search.svg" alt="buscar"></button>

      <form
      id="altaProducte"
      action="./functions/subirFoto.php"
      method="POST"
      enctype="multipart/form-data" >
      <label>Añadir imagenes:
      <input type="file" name="fileIMG" id="subirImagen" ></label>
      <input class="button" type="submit" name="enviar" value="enviar"  />
    </form>
    </div>
    
  </div>
  <div class="content">
      <div class="imgCard">
        <img src=".\photos\beverage-book-near-fireplace.jpg" alt="gallery image">
      </div>
      <div class="imgCard">
        <img src=".\photos\beverage-book-near-fireplace.jpg" alt="gallery image">
      </div>
      <div class="imgCard">
        <img src=".\photos\beverage-book-near-fireplace.jpg" alt="gallery image">
      </div>
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
              <?php foreach ($arrUsers as $key => $value) { ?>
                  <div class="cardUser">
                    <div class="boxIconUser">
                      <img class="iconUser" src="./img/user.svg" alt="mensaje">
                    </div>
                    <h3 id="userName"><?=$value['nickname'];?></h3>
                  </div>
              <?php } ?>
            </div>
          </div> 
          <div id="tab1" class="tab">
            <a href="#tab1">Datos imagen</a>
            <div class="tab-content">
                <div class="cardUser">
                  <h3 id="userName">nombre imagen</h3>
                </div>
                <div class="cardUser">
                  <h3 id="userName">nombre imagen</h3>
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.0.0/dist/css/ionicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Amigos</title>
</head>
<?php 
header('Content-Type: text/html; charset=UTF-8'); 

session_start();

if (isset($_POST['logout'])) {
  //$_SESSION['login'] = 0;
  session_unset();
  session_destroy();
  header("Location:login.php");
}

if (!isset($_SESSION) || $_SESSION['login'] === 0){
  header("Location:login.php");
}

// Verificar si existe un array de posts en la sesión, si no existe, crear uno
if (!isset($_SESSION['amigos'])) {
  $_SESSION['amigos'] = [];
}

//Buscar amigos
//require "./php/buscarAmigos.php";

//var_dump($_SESSION['amigos']);
//var_dump($_SESSION['amigos'][0][0]['friends'][0]);
// echo "<br>";
// echo "<br>";
// $array = $_SESSION['amigos'][0];
// var_export($array);
// echo "<br>";
// echo "<br>";
$arrayUsuario = [];

if($_SESSION['username'] === "Cris"){
  $arrayUsuario =$_SESSION['amigos'][0][0];
} else if($_SESSION['username'] === "Otro"){
  $arrayUsuario =$_SESSION['amigos'][0][1];
} else {
  echo "No tienes amigos";
}

?>
<body> 
    <header>
      <div class="collapse text-bg-dark" id="navbarHeader">
        <div class="container">
            <div class="py-4">
              <h4>Hola <?=$_SESSION['username']?>!</h4>
              <ul class="list-unstyled">
                <form method='POST'><input type="submit" class=" py-2" name="logout" value="Logout"></form>
              </ul>
            </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="index.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>Logo</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <main class="container mt-5">
        <form method="POST" class="my-5 row g-2" enctype="multipart/form-data">
            <h1 class="h3 mb-4 fw-normal">Buscar amigos:</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="nomBuscar" placeholder="amigo">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="cognomBuscar" placeholder="amigo">
                <label for="floatingInput">Apellido</label>
            </div>
            <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="buscar">Buscar</button>   
        </form>
        <div class="row mb-2">
        <?php if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["buscar"]) && !empty($_POST["nomBuscar"])){
          include_once ("./php/buscarAmigosNombre.php");
        } else if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["buscar"]) && !empty($_POST["cognomBuscar"])){
          include_once ("./php/buscarAmigosApellido.php");
        }else {
              // Mostrar lista de amigos almacenados en la sesión
              if(isset($arrayUsuario)) {
                  foreach($arrayUsuario['friends'] as $amigo) { ?>
                <div class="col-md-6">
                  <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"><?=$amigo['nom']?></h3>
                        <h3 class="mb-0"><?=$amigo['cognom']?></h3>
                      </div>
                      <div class="col-auto d-none d-lg-block">
                        <img src="<?=$amigo['imatge']?>" alt="imagen" class="bd-placeholder-img" width="300" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                      </div>
                  </div>
                </div>
              <?php }
              } else if (count($arrayUsuario['friends'])==0) {
                echo "No hay amigos creados.";
                echo "<div class=\"invalid-feedback\">No hay amigos creados.</div>";
              } }?> 
        </div>
    </main>
    <?php include_once ("./modulos/footer.php"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.0.0/dist/css/ionicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Posts</title>
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
if (!isset($_SESSION['posts'])) {
  $_SESSION['posts'] = [];
}

// Añadir post
require "./php/newPost.php";

// Añadir comentario
require "./php/newComment.php";

// Añadir Like
require "./php/newLike.php";

// var_dump($_SESSION['posts']);
// echo "<br>";
//session_destroy();
//print_r($_SESSION['posts']);
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
          <a href="#" class="navbar-brand d-flex align-items-center">
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
            <h1 class="h3 mb-4 fw-normal">Añadir post:</h1>
            <div class="form-floating">
                <input type="text" class="form-control <?=$titleClassErr?>" name="title" placeholder="titulo">
                <label for="floatingInput">Titulo</label>
                <?= $titleErr?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control <?=$bodyClassErr?>" name="body" placeholder="textoPost">
                <label for="floatingInput">Texto del post</label>
                <?= $bodyErr?>
            </div>
            <div class="form-floating">
              <!-- La imagen se guarda en la carpeta local -->
                <input class="form-control <?=$imgClassErr?>" type="file" name="img" accept=".png, .jpg, .jpeg">
                <?= $imgErr?>
            </div>

            <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="enviar">Añadir</button>   
        </form>
        <div class="row mb-2">
            
              <?php
              // Mostrar los posts almacenados en la sesión
              if(isset($_SESSION['posts'])) {
                  foreach($_SESSION['posts'] as $post) { ?>
                <div class="col-md-6">
                  <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"><?=$post['title']?></h3>
                        <p class="card-text mb-auto"><?=$post['body']?></p>
                        <p class="card-text mb-auto">Autor: <cite title="Source Title"><?=$post['author']?></cite></p>
                        <form method="post">
                        <input type="number" hidden name="postId" value="<?=$post['id']?>">
                        <button type="submit" class="btn mr-md-2 w-25 mb-md-0 mb-2 btn-outline-danger" name="newLike">
                        <?=$post['likes']?> <i class="ion-md-heart mr-1"></i> Likes
                        </button>
                        </form>
                      </div>
                      <div class="col-auto d-none d-lg-block">
                        <img src="<?=$post['img']?>" alt="imagen" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                      </div>
                      <div class="card-footer text-body-secondary">
                        <p class="mb-2 fw-semibold">Comentarios: <strong><?=count($post['comentarios'])?></strong></p>
                       <?php 
                       if(count($post['comentarios'])!==0) {
                        foreach($post['comentarios'] as $quote) { ?>
                        <blockquote class="blockquote mb-3">
                          <p class="fs-6"><?=$quote['quote']?></p>
                          <footer class="blockquote-footer fs-6 fst-italic"><?=$quote['author']?></footer>
                        </blockquote>
                        <?php }}?>
                        <form class="row row-cols-lg-auto g-3 align-items-center" method="POST">
                          <div class="col-auto">
                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Comentario</label>
                            <div class="input-group">
                              <input type="number" hidden name="postId" value="<?=$post['id']?>">
                              <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="newComment" placeholder="Añadir nuevo comentario">
                            </div>
                          </div>
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="sendComent">Ok</button>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
              <?php }
              } else if (count($_SESSION['posts'])==0) {
                echo "No hay posts creados.";
                echo "<div class=\"invalid-feedback\">No hay posts creados.</div>";
              } ?>  
            
        </div>
    </main>
   
    <?php include_once ("./modulos/footer.php"); ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
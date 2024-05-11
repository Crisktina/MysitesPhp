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

if (isset($_POST["logout"])) {
  session_start();
  $_SESSION["login"] = 0;
  session_destroy();
  header("Location:login.php");
}

session_start();

if (!isset($_SESSION) || $_SESSION["login"] === 0){
  header("Location:login.php");
}

$titleErr = $titleClassErr = $bodyErr = $bodyClassErr = "";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
  if(!empty($_POST["title"])) {
    if (!is_string($_POST["title"]) || strlen($_POST["title"]) < 8){
      $titleErr = "<div class=\"invalid-feedback\">El titulo debe contener letras y ser mayor de 8 caracteres.</div>";
      $titleClassErr = "is-invalid";
    } 
    if (!is_string($_POST["body"]) || strlen($_POST["body"]) > 500){
      $bodyErr = "<div class=\"invalid-feedback\">El texto debe contener letras y ser menor de 500 caracteres.</div>";
      $bodyClassErr = "is-invalid";
    } 
  }
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
            <input type="text" hidden name="user" value="<?=$_SESSION['username']?>">
            <input type="text" hidden name="likes" value="<?=0?>">
            <!--Hacer que se autoincremente +1 el id en cada submit-->
            <input type="num" hidden name="id" value="<?=10?>"> 
            <div class="form-floating">
                <input type="text" class="form-control <?=$titleClassErr?>" id="floatingInput" name="title" placeholder="titulo">
                <label for="floatingInput">Titulo</label>
                <?= $titleErr?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control <?=$bodyClassErr?>" id="floatingInput" name="body" placeholder="textoPost">
                <label for="floatingInput">Texto del post</label>
                <?= $bodyErr?>
            </div>
            <div class="form-floating">
                <input class="form-control" type="file" id="formFile" name="img" accept="image/*">
            </div>

            <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="send">Añadir</button>   
        </form>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                      <h3 class="mb-0">Featured post</h3>
                      <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                      <p class="card-text mb-auto">Autor: <cite title="Source Title">Cristina</cite></p>
                      <button type="button" class="btn mr-md-2 w-25 mb-md-0 mb-2 btn-outline-danger">
                      2 <i class="ion-md-heart mr-1"></i> Likes
                      </button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                      <img src="./img/img1.jpg" alt="imagen paisaje" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                    <div class="card-footer text-body-secondary">
                      <p class="mb-2 fw-semibold">Comentarios:</p>
                      <blockquote class="blockquote mb-0">
                        <p class="fs-6">A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer fs-6 fst-italic">Autor</footer>
                      </blockquote>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                      <h3 class="mb-0">Post title</h3>
                      <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                      <p class="card-text mb-auto">Autor: <cite title="Source Title">Pablo</cite></p>
                      <button type="button" class="btn mr-md-2 w-25 mb-md-0 mb-2 btn-outline-danger">
                      2 <i class="ion-md-heart mr-1"></i> Likes
                      </button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                      <img src="./img/img2.jpg" alt="imagen paisaje" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                    <div class="card-footer text-body-secondary">
                      <p class="mb-2 fw-semibold">Comentarios:</p>
                      <blockquote class="blockquote mb-0">
                        <p class="fs-6">A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer fs-6 fst-italic">Autor</footer>
                      </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </main>
   
    <?php include_once ("./modulos/footer.php"); ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
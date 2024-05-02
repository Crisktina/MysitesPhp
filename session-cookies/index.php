<?php 
session_start();

if (!isset($_GET['carpeta'])) {
  $carpeta = "./galeria";
} else {
 $carpeta = $_GET['carpeta'];
}

?>
<!doctype html>
<html lang="es" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Album de fotos">
    <title>Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>

    <header>
      <div class="collapse text-bg-dark" id="navbarHeader">
        <div class="container">
            <div class="py-4">
              <h4>Hola <?=$_SESSION['username']?>!</h4>
              <ul class="list-unstyled">
                <li><a href="login.php" class="text-white">Log out</a></li>
              </ul>
            </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>Album</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main>

      <section class="py-4 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
          <?php
            if (is_dir($carpeta)){
              if ($dh = opendir($carpeta)){
                while (($file = readdir($dh)) !== false){
                  if (!($file=="." || $file=="..")){
                    echo '1';
                   // header('Location:index.php?album='.$file);
                    //mostrar primer album
                    if(is_dir($file)){
                      echo '2';
                      
                    }
                    //elegir album, poner un menu para elegir a través del boton de cambiar carpeta
                     if(isset($_GET['album']) && $_GET['album']==$file){
                      echo "<h1 class=\"fw-light\">$file</h1>";
                     }

                    
                  }

                 
                }
                closedir($dh);
              }

              ?>
            
            <p>
              <a href="#" class="btn btn-primary my-2">Añadir imagenes</a>
              <a href="index.php?album=<?=$file?>" class="btn btn-secondary my-2">Cambiar de carpeta</a>
            </p>
          </div>
        </div>
      </section>

      <div class="album py-5 bg-body-tertiary">
        <div class="container">

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                <div class="card-body">
                  <p class="card-text">nombre imagen</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                    </div>
                    <small class="text-body-secondary">formato</small>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }?>

          </div>
        </div>
      </div>

    </main>

    <footer class="text-body-secondary py-4">
      <div class="container">
        <p class="float-end mb-1">
          <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Plantilla de Bootstrap &copy;</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>

  </body>
</html>


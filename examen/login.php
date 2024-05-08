<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
            <strong>Logo</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-50 m-auto">
                <?php 
                if(isset($_GET['err']) && $_GET['err']==1){
                    echo "<h2>No ha funcionado el inicio de sesión :(</h2>";
                }
                ?>
            <form method="POST" action="login.php">
                
                <h1 class="h3 mb-3 fw-normal">Sign In:</h1>

                <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="user" placeholder="nombre">
                <label for="floatingInput">Usuario</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
                </div>

                <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember" name="remember" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Recordar
                </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" name="send">Sign In</button>
                <a class="btn btn-danger w-100 py-2 my-3" href="signUp.php" >Sign Up</a>
                
            </form>
        </main>
    </div>
   
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Company, Inc</p>
        </footer>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
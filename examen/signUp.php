<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body> 
    <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>Logo</strong>
          </a>
        </div>
      </div>
    </header>
    <div class="d-flex align-items-center py-5 bg-body-tertiary">
        <main class="form-signin w-50 m-auto">
                <?php 
                if(isset($_GET['err']) && $_GET['err']==1){
                    echo "<h2>No ha funcionado el registro :(</h2>";
                }
                ?>
            <form method="POST" action="signUp.php" class="needs-validation row g-2" novalidate>
                <h1 class="h3 mb-3 fw-normal">Sign Up:</h1>
                <div class="form-floating">
                    <input type="text" class="form-control is-invalid" id="floatingInput" name="user" placeholder="nombre" required>
                    <label for="floatingInput">Nombre</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control is-invalid" id="floatingInput" name="surname" placeholder="apellido" required>
                    <label for="floatingInput">Apellido</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control is-invalid" id="floatingInput" name="date" placeholder="date" required>
                    <label for="floatingInput">Fecha de nacimiento</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control is-invalid" id="floatingInput" name="email" placeholder="email" required>
                    <label for="floatingInput">Email</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control is-invalid" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Contraseña</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="password2" class="form-control is-invalid" id="floatingPassword" name="password2" placeholder="Password2" required>
                    <label for="floatingPassword">Repetir contraseña</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="send">Sign Up</button>
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
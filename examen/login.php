<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign In</title>
</head>
<?php 
header('Content-Type: text/html; charset=UTF-8'); 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
    $user = test_input($_POST["user"]);
    $password = test_input($_POST["password"]);
    $passwordCodificado = sha1(md5($password));
    
    // password = 1234 user= Cris
    if($user == "Cris" && $passwordCodificado == "63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1" && isset($_POST['remember'])){

        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0, // '0' = expire when browser closes
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);

        if(isset($_POST['remember'])) {
            $name = 'remember_me';
            $value = 1; //podria ser el token o el id del usuario
            $expire = time() + 60*60*24*3; // 3 dias
            $path = '/';
            $domain = '';
            $secure = true;
            $httponly = true;
          
            setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        }
          
        //regenera el token de la session perpetua por defecto
        session_regenerate_id();
        
        //almacenar ID de usuario en la session (se deberia hacer mediante token)
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $passwordCodificado;
        header('Location:index.php');

    } else {
        // credenciales no correctas
      header('Location:login.php?err=1');
    }
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<body> 
    <?php require "./modulos/headerLogin.php"; ?>
    <div class="d-flex align-items-center py-5 bg-body-tertiary">
        <main class="form-signin w-50 m-auto">
            <form method="POST" action="login.php" class="row g-2 needs-validation" >
                
                <h1 class="h3 mb-3 fw-normal">Sign In:</h1>

                <div class="form-floating">
                    <input type="text" class="form-control <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "is-invalid";
                    }
                    ?>" id="floatingInput" name="user" placeholder="nombre" value="Cris">
                    <label for="floatingInput">Usuario</label>
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
                    }
                    ?>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "is-invalid";
                    }?>" id="floatingPassword" name="password" placeholder="Password" value="1234">
                    <label for="floatingPassword">Contraseña</label>
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
                    }
                    ?>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "is-invalid";
                    }?>" type="checkbox" value="remember" name="remember" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Recordar</label>
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']==1){
                        echo "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
                    }
                    ?>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" name="send">Sign In</button>
                <a class="btn btn-danger w-100 py-2 my-3" href="signUp.php" >Sign Up</a>
                
            </form>
        </main>
    </div>
   
    <?php require "./modulos/footer.php"; ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
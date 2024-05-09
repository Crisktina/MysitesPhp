<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<?php 
header('Content-Type: text/html; charset=UTF-8'); 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
    // comprovaciones

    $user = test_input($_POST["user"]);
    $surname = test_input($_POST["surname"]);
    $email = validateEMAIL($_POST["email"]);
    $date = validateFecha($_POST["date"]);
    $password = test_input($_POST["password"]);
    $password2 = validatePassword2($_POST["password"],$_POST["password2"] );
    $passwordCodificado = sha1(md5($password));
    
    // password = 1234 user= Cris
    if($user == "Cris" && $passwordCodificado == "63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1" ){

        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0, // '0' = expire when browser closes
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);

        if(isset($_POST['send'])) {
            $name = 'signUp';
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
        $_SESSION['user'] = $user;
        $_SESSION['surname'] = $surname;
        $_SESSION['date'] = $date;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $passwordCodificado;
        header('Location:index.php');

    } else {
        // credenciales no correctas
      header('Location:login.php?err=1');
    }

    require "./php/comprovaciones.php";
} ?>
<body> 
<?php require "./modulos/headerLogin.php"; ?>
    <div class="d-flex align-items-center py-5 bg-body-tertiary">
        <main class="form-signin w-50 m-auto">
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
                    <?php 
                    if(isset($_GET['fechaErr']) && $_GET['fechaErr']==1){
                        echo "<div class=\"invalid-feedback\">La fecha no cumple con el formato correcto. </div>";
                    } else if (isset($_GET['edadErr']) && $_GET['edadErr']==1) {
                        echo "<div class=\"invalid-feedback\">La edad mínima son 18 años. </div>";
                    }
                    ?>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control is-invalid" id="floatingInput" name="email" placeholder="email" required>
                    <label for="floatingInput">Email</label>
                   <?php if(isset($_GET['mailErr']) && $_GET['mailErr']==1){
                        echo "<div class=\"invalid-feedback\">El email no cumple con el formato correcto.</div>";
                    }
                    ?>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control is-invalid" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Contraseña</label>
                    <div class="invalid-feedback">El campo es obligatorio.</div>
                </div>
                <div class="form-floating">
                    <input type="password2" class="form-control is-invalid" id="floatingPassword" name="password2" placeholder="Password2" required>
                    <label for="floatingPassword">Repetir contraseña</label>
                    <?php if(isset($_GET['passwordErr']) && $_GET['passwordErr']==2){
                        echo "<div class=\"invalid-feedback\">La contraseña no coincide.</div>";
                    }
                    ?>
                </div>
                <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="send">Sign Up</button>
            </form>
        </main>
    </div>
   
    <?php require "./modulos/footer.php"; ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
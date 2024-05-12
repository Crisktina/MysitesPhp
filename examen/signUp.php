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

    $passwordErr = $password2Err = $passwordClassErr = $userErr = $userClassErr = $surnameErr = $surnameClassErr = $emailErr = $emailClassErr = $dateErr = $dateClassErr = "";
    $user = $password = $password2 = $passwordCodificado = $email = $date = $surname = "";

    //otras validaciones
    require "./php/comprovaciones.php";
    
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
        $ok = 0;

        //Validar inputs
        if (empty($_POST["user"])) {
            $userErr = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $userClassErr = "is-invalid";
        } else {
            $user = test_input($_POST["user"]);
            $ok++;
        }

        if (empty($_POST["surname"])) {
            $surnameErr = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $surnameClassErr = "is-invalid";
        } else {
            $surname = test_input($_POST["surname"]);
            $ok++;
        }

        if (empty($_POST["date"])) {
            $dateErr = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $dateClassErr = "is-invalid";
        } else {
            $date_obj = DateTime::createFromFormat('d/m/Y', $_POST["date"]);
            if (!$date_obj) {
                $dateErr = "<div class=\"invalid-feedback\">El campo no cumple con el formato.</div>";
                $dateClassErr = "is-invalid";
            } else if (!mayorEdad($date_obj)) {
                $dateErr = "<div class=\"invalid-feedback\">No eres mayor de edad.</div>";
                $dateClassErr = "is-invalid";
            } else $ok++;
        }

        if (empty($_POST["email"])) {
            $emailErr = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $emailClassErr = "is-invalid";
        } else {
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "<div class=\"invalid-feedback\">El campo no cumple con el formato.</div>";
                $emailClassErr = "is-invalid";
            } else $ok++;
        }
    
        if (empty($_POST["password"])) {
            $passwordErr = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $passwordClassErr = "is-invalid";
        } else {
            if (strlen($_POST["password"]) < 8) {
                $passwordErr = "<div class=\"invalid-feedback\">La Contraseña debe contener 8 caracteres mínimo.</div>";
                $passwordClassErr = "is-invalid";
            } else {
                $regexpas = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\W).{8,}$/';
                if (!preg_match($regexpas, $_POST["password"])) {
                    $passwordErr = "<div class=\"invalid-feedback\">La Contraseña debe contener al menos una mayúscula, una minúscula y un caracter especial.</div>";
                    $passwordClassErr = "is-invalid";
                } else{
                    $ok++;
                    $passwordCodificado = sha1(md5($password));
                } 
            }
        }

        if (empty($_POST["password2"])) {
            $password2Err = "<div class=\"invalid-feedback\">El campo es obligatorio.</div>";
            $passwordClassErr = "is-invalid";
        } else {
            if ($password2!==$password){
                $password2Err = "<div class=\"invalid-feedback\">La contraseña no coincide.</div>";
                $passwordClassErr = "is-invalid";
            } else $ok++;
        }

        // si todos los inputs son ok:
        if ($ok === 6){
            //inicar sesión
            require "./php/inicioSession.php";
        }
        
    
    } 
    
 ?>
<body> 
    <?php include_once ("./modulos/headerLogin.php"); ?>
    <div class="d-flex align-items-center py-5 bg-body-tertiary">
        <main class="form-signin w-50 m-auto">
            <form method="POST" action="signUp.php" class="needs-validation row g-2" novalidate>
                <h1 class="h3 mb-3 fw-normal">Sign Up:</h1>
                <div class="form-floating">
                    <input type="text" class="form-control <?=$userClassErr?>" id="floatingInput" name="user" placeholder="nombre" required value="Cris">
                    <label for="floatingInput">Nombre</label>
                    <?= $userErr?>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control <?=$surnameClassErr?>" id="floatingInput" name="surname" placeholder="apellido" required value="Hidalgo">
                    <label for="floatingInput">Apellido</label>
                    <?= $surnameErr?>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control <?=$dateClassErr?>" id="floatingInput" name="date" placeholder="date" required value="dd/mm/yyyy">
                    <label for="floatingInput">Fecha de nacimiento</label> 
                    <?= $dateErr?>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control <?=$emailClassErr?>" id="floatingInput" name="email" placeholder="email" required value="ejemplo@mail.com">
                    <label for="floatingInput">Email</label>
                    <?= $emailErr?>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control <?=$passwordClassErr?>" id="floatingPassword" name="password" placeholder="Password" required value="Pass00??">
                    <label for="floatingPassword">Contraseña</label>
                    <?= $passwordErr?>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control <?=$passwordClassErr?>" id="floatingPassword" name="password2" placeholder="Password2" required value="Pass00??">
                    <label for="floatingPassword">Repetir contraseña</label>
                    <?= $password2Err?>
                </div>
                <button class="btn btn-primary w-100 py-2 my-3" type="submit" name="send">Sign Up</button>
                <a class="btn btn-danger w-100 py-2 my-3" href="login.php" >Log In</a>
            </form>
        </main>
    </div>
   
    <?php include_once ("./modulos/footer.php"); ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
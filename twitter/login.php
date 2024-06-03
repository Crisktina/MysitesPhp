<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Twitter</title>
</head>
<?php 
//recoger datos del post
if(isset($_POST['user']) && isset($_POST['pass'])){
    require_once "./data/conexion_ddbb.php";
    $user = $_POST['user'];
    //TODO: HACER CODIFICACIÓN INVERSA DE PASSWORD
    $password = $_POST['pass']; 
    //consulta de datos
    $consulta = "SELECT * FROM users WHERE nickname='$user' AND pwd='$password'";
    //echo $consulta;
    //Acceso si o no...
    if(isset($consulta)){
        
        $result = mysqli_query ($conexion, $consulta) or die ("Fallo en la consulta");
        //echo $result->num_rows;
        if($result->num_rows==1){
            echo "incio de sessión";
            header('Location: index.php');
        }
        
    } else {
        header('Location: login.php');
        echo "Usuario y password incorrectos";
    }
    require_once "./data/close_conexion_ddbb.php";
}

?>
<body>
    <div class="containerLogin">
        <form class="formLogin" method="post">
            <img class="logo" src="./img/twitter.png" alt="logo">
            <h2>Login</h2>
            <input type="text" placeholder="Nickname" name="user">
            <input type="password" placeholder="Password" name="pass"> 
            <button class="button btnForm" type="submit">Enviar</button>
            <p>¿Todavia no tienes usuario? <a class="linkLogin" href="register.php">¡Registra-te!</a></p>
        </form>
    </div>
    
</body>
</html>
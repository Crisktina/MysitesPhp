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
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
if(isset($_POST['user']) && isset($_POST['pass'])){
    require_once "./data/conexion_ddbb.php";
    $user = test_input($_POST['user']);
    //TODO: HACER CODIFICACIÓN INVERSA DE PASSWORD
    $password = test_input($_POST['pass']);
    $passwordCodificado = sha1(md5($password));
    
    //consulta de datos
    $consulta = "SELECT * FROM users WHERE nickname='$user' AND pwd='$passwordCodificado'";
    $consultaID = "SELECT id FROM users WHERE nickname='$user' AND pwd='$passwordCodificado'";
   

    //Acceso si o no...
    if(isset($consulta) && isset($consultaID)){
        $resultID = mysqli_query ($conexion, $consultaID) or die ("Fallo en la consulta");
        $arrUserID = [];
        while ($fila = $resultID -> fetch_array(MYSQLI_ASSOC)) {$arrUserID[]=$fila;}
        //var_dump($arrUserID[0]);
        $userID= $arrUserID[0]['id'];
        
        $result = mysqli_query ($conexion, $consulta) or die ("Fallo en la consulta");
        //echo $result->num_rows;
        if($result->num_rows==1){
            echo "incio de sessión";
            session_start([
                'use_only_cookies' => 1,
                'cookie_lifetime' => 0, // '0' = expire when browser closes
                'cookie_secure' => 1,
                'cookie_httponly' => 1
            ]);

                $name = 'remember_me';
                $value = $userID; //podria ser el token o el id del usuario
                $expire = time() + 60*60*24*3; // 3 days from now
                $path = '/';
                $domain = '';
                $secure = true;
                $httponly = true;
                setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
            //regenera el token de la session perpetua por defecto
            session_regenerate_id();
            //almacenar ID de usuario en la session (se deberia hacer mediante token)
            $_SESSION['user_id'] = $userID;
            $_SESSION['username'] = $user;
            header('Location:index.php');
        }
        
    } else {
        header('Location: login.php');
        echo "Usuario y password incorrectos";
    }
    require_once "./data/close_conexion_ddbb.php";
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
    <div class="containerLogin">
        <form class="formLogin" method="post">
            <img class="logo" src="./img/twitter.png" alt="logo">
            <h2>Login</h2>
            <input type="text" placeholder="Nickname" name="user">
            <input type="password" placeholder="Password" name="pass"> 
            <button class="button btnForm" type="submit" name="send">Enviar</button>
            <p>¿Todavia no tienes usuario? <a class="linkLogin" href="register.php">¡Registra-te!</a></p>
        </form>
    </div>
    
</body>
</html>
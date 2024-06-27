<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Maps</title>
</head>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){

//recoger datos del post
    if(isset($_POST['name']) && isset($_POST['nickname']) && isset($_POST['fechaNacimiento']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['passConfirm'])){
        $name = $_POST['name'];
        $nickname = $_POST['nickname'];
        $fechaNacimiento = $_POST['fechaNacimiento']; 
        $email = $_POST['email']; 
        $pwd = $_POST['pass']; 
        $passwordCodificado = sha1(md5($pwd));
        $pwdConfirm = $_POST['passConfirm']; 
        $salt = rand(0,99999);

        //insertar datos
        require_once "./data/conexion_ddbb.php";
        $consulta = "INSERT INTO users (nombre, nickname, mail, fecha_nacimiento, pwd, salt) VALUES ('$name', '$nickname', '$email','$fechaNacimiento','$passwordCodificado','$salt');";
        //echo $consulta;

        //Acceso si o no...
        if(isset($consulta)){
        
            $result = mysqli_query ($conexion, $consulta) or die ("Fallo en la consulta");
            //print_r($result);
            if($result==1){
                echo "incio de sessión";
                header('Location: index.php');
            }

        } else {
        header('Location: registro.php');
        echo "No te has registrado con exito";
        }
        require_once "./data/close_conexion_ddbb.php";
    }
}
    

?>
<body>
<div class="containerLogin">
    <form class="formLogin" method="post">
      <img class="logo" src="./img/twitter.png" alt="logo">
      <h2>Registro</h2>
      <input type="text" placeholder="Nombre de usuario" name="name">
      <input type="text" placeholder="Nickname" name="nickname">
      <input type="date" placeholder="Año de nacimiento" name="fechaNacimiento">
      <input type="email" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="pass"> 
      <input type="password" placeholder="Confirmar password" name="passConfirm"> 
      <button class="button btnForm" type="submit" name="send">Enviar</button>
      <p>¿Ya tienes usuario? <a class="linkLogin" href="login.php">¡Hacer Login!</a></p>
    </form>
</div>
    
</body>
</html>
<!doctype html>
<html lang="es" data-bs-theme="auto">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.122.0">
        <title>Registro usuario</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        </style>
        <!-- Custom styles for this template -->
        <link href="./sign-in.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <?php 
header('Content-Type: text/html; charset=UTF-8'); 
echo "ok";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
    $user = test_input($_POST["user"]);
    $password = test_input($_POST["password"]);
    $passwordCodificado = sha1(md5($password));
    echo $user;
    echo "<br>";
    echo $passwordCodificado;
    echo "<br>";
    echo "67a74306b06d0c01624fe0d0249a570f4d093747";
    
    // password = 1234 user= Cris
    if($user == "Cris" && $passwordCodificado == "63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1"){

        echo "ok";
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0, // '0' = expire when browser closes
            'cookie_secure' => 1,
            'cookie_httponly' => 1
          ]);

          if(isset($_POST['remember'])) {
            $name = 'remember_me';
            $value = 1; //podria ser el token o el id del usuario
            $expire = time() + 60*60*24*3; // 3 days from now
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
        header('Location:holaUser.php');

    } else {
        // credenciales no correctas
      header('Location:index.php?err=1');
    }
} else {
    echo "que pasa???";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
    
        <main class="form-signin w-100 m-auto">
            <?php 
            if(isset($_GET['err']) && $_GET['err']==1){
                echo "<h2>No ha funcionado el inicio de sesión :(</h2>";
            }
            ?>
        <form method="POST" action="index.php">
            
            <h1 class="h3 mb-3 fw-normal">Registro:</h1>

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
                Aceptar cookies
            </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="send">Iniciar</button>
            
        </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>

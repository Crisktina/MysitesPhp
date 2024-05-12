<?php 
 //otras validaciones
 require "./php/comprovaciones.php";

$titleErr = $titleClassErr = $bodyErr = $bodyClassErr = $imgErr = $imgClassErr = "";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["enviar"])){
  $img = "";
  if(!empty($_POST["title"]) && !empty($_POST["body"]) && is_uploaded_file($_FILES['img']['tmp_name'])) {
    $ok = 0;
    //Verificación de tamaño de post
    if (test_input($_POST["title"]) && is_string($_POST["title"]) && strlen($_POST["title"]) > 8){
      //almacenar title
      $title = $_POST['title'];
      $ok++;
    } else {
      $titleErr = "<div class=\"invalid-feedback\">El titulo debe contener letras y ser mayor de 8 caracteres.</div>";
      $titleClassErr = "is-invalid";
    }
    if (test_input($_POST["body"]) && is_string($_POST["body"]) && strlen($_POST["body"]) < 500){
      //almacenar body
      $body = $_POST['body'];
      $ok++;
    } else {
      $bodyErr = "<div class=\"invalid-feedback\">El texto debe contener letras y ser menor de 500 caracteres.</div>";
      $bodyClassErr = "is-invalid";
    }

    //Hacer que se autoincremente +1 el id en cada submit
    $id = count($_SESSION['posts']) + 1;
  
    //Subir imagenes y cambiar a la carpeta img
    $nombreDirectorio= "./img/";
    $idUnico= time();
    $nombreFichero= $idUnico. "-" . $_FILES['img']['name'];
    // move
    $subido = move_uploaded_file($_FILES['img']['tmp_name'], $nombreDirectorio.$nombreFichero);
    if(!$subido) {
        $imgErr = "<div class=\"invalid-feedback\">No se ha podido mover el fichero a la carpeta definitiva".$_FILES['img']['error'].".</div>";
        $imgClassErr = "is-invalid";
    } else{
        $img = $nombreDirectorio.$nombreFichero;
        $ok++;
    }

    // Crear un nuevo post
    if ($ok === 3){
      $post = [
        'id' => $id,
        'title' => $title,
        'body' => $body,
        'author' => $_SESSION['username'],
        "img" =>  $img,
        'likes' => 0, // Por defecto
        'comentarios' => []
      ];
      // Agregar el nuevo post al array de posts en la sesión
      $_SESSION['posts'][] = $post;
    }

  } else {
    if(empty($_POST['title'])) {
      $titleErr = "<div class=\"invalid-feedback\">El título es requerido.</div>";
      $titleClassErr = "is-invalid";
    }
    if(empty($_POST['body'])) {
      $bodyErr = "<div class=\"invalid-feedback\">El texto del post es requerido.</div>";
      $bodyClassErr = "is-invalid";
    }
    if(empty($_POST['img'])) {
      $imgErr = "<div class=\"invalid-feedback\">La imagen del post es requerida.</div>";
      $imgClassErr = "is-invalid";
    }
  }
  header("Location: index.php");
    exit();
}

?>
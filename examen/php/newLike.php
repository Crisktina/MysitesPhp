<?php 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["newLike"])){

        $postId = (int)$_POST["postId"]-1;

        // var_dump($postId);
        // echo "<br>";
        // echo "<br>";
        
        // var_dump($_SESSION['posts'][$postId]['likes']);
        // echo "<br>";
        // echo "<br>";
        
        
      // Crear un nuevo like
      if (isset($_SESSION['posts'][$postId])) {
        
        // Obtener el array de likes del post
        $like = $_SESSION['posts'][$postId]['likes'];
        $like++;
        // var_dump($like);
        // echo "<br>";
        // echo "<br>";

        // Asignar +1 de likes al post
        $_SESSION['posts'][$postId]['likes'] = $like;
     
      }
}

?>
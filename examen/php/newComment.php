<?php 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["sendComent"])){
   
    if(!empty($_POST["newComment"])) {
        $postId = (int)$_POST["postId"]-1;
        $newComment = $_POST["newComment"];
        $author = $_SESSION['username'];

        // var_dump($postId);
        // echo "<br>";
        // echo "<br>";
        
        // var_dump($newComment);
        // echo "<br>";
        // echo "<br>";
        
        // var_dump($author);
        // echo "<br>";
        // echo "<br>";

        // var_dump($_SESSION['posts'][$postId]['comentarios']);
        // echo "<br>";
        // echo "<br>";
        
        
      // Crear un nuevo comentario
      if (isset($_SESSION['posts'][$postId])) {
        
        // Obtener el array de comentarios del post
        $comentarios = $_SESSION['posts'][$postId]['comentarios'];
            
        // Agregar el nuevo comentario al array de comentarios
        $comentarios[] = [
            'quote' => $newComment,
            'author' => $author
        ];

        // Asignar el array modificado de comentarios de nuevo al post
        $_SESSION['posts'][$postId]['comentarios'] = $comentarios;
     
      }
    }
}
?>
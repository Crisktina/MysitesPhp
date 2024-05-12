<?php 
        // regenera el token de la session perpetua por defecto
        session_regenerate_id();
                
        // almacenar usuario en la session (se deberia hacer mediante token)
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $passwordCodificado;
        $_SESSION['posts'] = [];
        $post = [
            
                'id' => 1,
                'title' => "Ea molestias quasi exercitationem repellat",
                'body' => "Et iusto sed quo iure voluptatem occaecati omnis eligendi aut ad voluptatem doloribus vel accusant.",
                'author' => "Pablo",
                "img" => "./img/img1.jpg",
                'likes' => 2,
                'comentarios' => [
                    ['quote' => "Enostrum rerum est autem sunt rem eveniet architecto.",
                    'author' => "Cris"],
                    ['quote' => "Equia et suscipit\nsuscipit recusandae consequuntur expedita et cum.",
                    'author' => "Rafa"]
                ]
        ];
    
        // Agregar el nuevo post al array de posts en la sesión
        $_SESSION['posts'][] = $post;

        // entrar en la parte privada
        header('Location:index.php');
?>
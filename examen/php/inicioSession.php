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

        $_SESSION['amigos'] = [];
        $amigos = [
                [
                'nom' => "Pepito",
                'cognom' => "Grillo",
                'imatge' => "https://th.bing.com/th/id/R.e0d333e329ecf9cbba6353ff6a870808?rik=4nY1jgmDbO%2biRA&pid=ImgRaw&r=0"
                ],
                [
                'nom'=> "Pinocho",
                'cognom'=> "nas llarg",
                'imatge'=> "https://th.bing.com/th/id/R.c813e69f6c5d1845d6755600669ee498?rik=rZmnn%2f4FATuFtg&riu=http%3a%2f%2f3.bp.blogspot.com%2f-8MRPRWTSoXM%2fUzCZc3zQwkI%2fAAAAAAABAIU%2ftPq4QUlpGxg%2fs1600%2fpinocho%2bwalt%2bdisney%2b1940%2bstill%2bscreencaps%2bpersonaje%2bcharacter%2bpinocchio.jpg&ehk=XFvTdJuRXWyRYzwUCI%2fQbftNCazFiC1Cg4b0vwnY4Pg%3d&risl=&pid=ImgRaw&r=0"
                ],
                [
                'nom'=> "Geppeto",
                'cognom'=> "constructor de ninots",
                'imatge'=> "https://vignette.wikia.nocookie.net/lemondededisney/images/4/42/Geppetto.jpg/revision/latest?cb=20171031142647&path-prefix=fr"
                 ],
                 [
                'nom'=> "Pepito",
                'cognom'=> "Pérez",
                'imatge'=> "https://i0.wp.com/comunidad.recursoseducativos.com/wp-content/uploads/2017/09/ratoncito-perez.jpg?fit=1189%2C965&ssl=1"
                ],
                [
                'nom'=> "Pepet",
                'cognom'=> "i Marierta",
                'imatge'=> "https://th.bing.com/th/id/R.2850441a5bac031b8e3584d3ad0798fa?rik=iYvw3IZHXxTOhw&riu=http%3a%2f%2fwww.imagenzone.net%2ffondos-de-pantalla%2fDibujos-animados%2f1157.jpg&ehk=xWp1%2fqHAe73RQJEkkOua%2fBSVt95MQV4I4c6uBLU%2f1IY%3d&risl=&pid=ImgRaw&r=0"
                ]
        ];
    
        // Agregar el nuevo post al array de posts en la sesión
        $_SESSION['amigos'][] = $amigos;

        // entrar en la parte privada
        header('Location:index.php');
?>
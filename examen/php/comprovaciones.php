<?php 

// evitar hackers
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// La data ha de ser data i l’usuari major d’edat.
function mayorEdad($data) {
    $currentFecha = new DateTime();
    $diferencia =  $data->diff($currentFecha);
    $edad =  $diferencia->y;
    if ($edad>=18){
        return $data;
    } else return false;
}

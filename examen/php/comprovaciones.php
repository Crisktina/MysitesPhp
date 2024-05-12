<?php 

// Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
// Remove backslashes \ from the user input data (with the PHP stripslashes() function)
// The htmlspecialchars() function converts special characters into HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
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

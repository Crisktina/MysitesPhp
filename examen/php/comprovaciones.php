<?php 


//TO DO:
//todos son campos obligatorios.



// solo string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// L’email ha de ser correu electrònic
function validateEMAIL($data) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
    $result= (bool)preg_match($v, $data);
    if($result== true){
        return $data;
    } else {
        header('Location:login.php?mailErr=1');
     }
}

// La data ha de ser data i l’usuari major d’edat.
function validateFecha($data) {
    $regexFecha = "/^([0-2][0-9]|3[0-1])(\\/|-)(0[1-9]|1[0-2])\\2(\\d{4})(\\s)$/";

if (preg_match($regexFecha, $data, $matchFecha)) {
    $fecha = new DateTime($data);
    $currentFecha = new DateTime();
    $diferencia =  $fecha->diff($currentFecha);
    $edad =  $diferencia->y;
    if ($edad>=18){
        return $data;
    } else {
        //no cumple con la edad
        header('Location:login.php?edadErr=1');
    }
    return $data;
    
} else {
    //no cumple con el formato
    header('Location:login.php?fechaErr=1');
}
}

// La password ha de coincidir
function validatePassword2($password, $password2) {
   
    if ($password2===$password){
        return $password2;
    } else {
        header('Location:login.php?passwordErr=2');
     }
}

//TO DO:
// La password ha tenir una minúscula,una majúscula, un caràcter especial i entre 6 i 8 caràcters.
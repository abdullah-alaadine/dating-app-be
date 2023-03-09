<?php 

// prevent Cross-Site Scripting attacks
function toBeSafe($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function isNumber($data){
    if (!preg_match ("/^[0-9]*$/", $data) ){  
        return false;  
    }
    return true;
}
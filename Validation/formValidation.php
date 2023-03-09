<?php 

// prevent Cross-Site Scripting attacks
function to_be_safe($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function is_number($data){
    if (!preg_match ("/^[0-9]*$/", $data) ){  
        return false;  
    }
    return true;
}

function valid_name($data){
    if (!preg_match ("/^[a-zA-z]*$/", $data) ) {  
        return false; 
    }
    return true;
}

function valid_email($email){
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $email) ){  
        return false; 
    }
    return true;
}

function is_strong_password($pwd){
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
        return false;
    }
    return true;
}
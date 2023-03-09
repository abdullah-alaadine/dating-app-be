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
    if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
        return false; 
    }
    return true;
}
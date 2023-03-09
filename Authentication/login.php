<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json; charset=utf-8');

include("../database.php");
include("../Authentication/jwt.php");
include("../Validation/formValidation.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = to_be_safe($_POST["email"]);
    $password = to_be_safe($_POST["password"]);
    $query = "SELECT `email` FROM `users` WHERE `email` = '".$email."'";
    $result = $connection->query($query);
    if ($result->num_rows > 0){
        $data = $result->fetch_assoc();
        if(!password_verify($password, $data["password"])){
            echo json_encode([
                "error" => "incorrect data"
            ]);
            die();
        }
    } else {
        echo json_encode([
            "error" => "incorrect data"
        ]);
        die();
    }
}else{
    echo json_encode([
        "error" => "Some uninserted fields are required!"
    ]);
}
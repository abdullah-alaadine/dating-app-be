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
}else{
    echo json_encode([
        "error" => "Some uninserted fields are required!"
    ]);
}
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json; charset=utf-8');

include("../database.php");
include("../Authentication/jwt.php");
include("../Validation/formValidation.php");

if(isset(apache_request_headers()["Authorization"])){
    $arr = explode(" ", apache_request_headers()["Authorization"]);
    try {
        $decoded = HandleJWT::decode_JWT_token($arr[1]);
        echo "Bannananana!";
    }catch (SignatureInvalidException $e) {
        echo json_encode([
            "error" => "unauthorized action"
        ]);
        die();
    }catch (ExpiredException $e) {
        echo json_encode([
            "error" => "token expired"
        ]);
        die();
    }catch(Exception $e){
        echo json_encode([
            "error" => "unauthorized action"
        ]);
        die();
    }
}
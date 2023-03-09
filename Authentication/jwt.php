<?php

require __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$payload = [
    "id" => 24981
];
$key = "ub3fb1348-9bfn[u3v13in1034";

$token = JWT::encode($payload, $key, "HS256");


function generateJWTToken($payload){

}
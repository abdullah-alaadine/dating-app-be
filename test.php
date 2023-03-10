<?php

// include __DIR__ . ("..\\Authentication\\jwt.php");
require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$payload = [
    "id" => 14
];

$token = JWT::encode($payload, "secret", 'HS256');
echo $token;

$dex = JWT::decode($token, new Key("secret", 'HS256'));
print_r($dex);
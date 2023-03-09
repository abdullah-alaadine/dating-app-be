<?php

require __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class HandleJWT {
    private $key = "akf23w3r34rQ#O891-rh4";
    private $algorithm = "HS256";
    public static function get_JWT_token($payload){
        return JWT::encode($payload, this->$key, this->$algorithm);
    }
    public static function decode_JWT_token($token){
        return JWT::decode($token, new Key(this->key, this->algorithm));
    }
}
<?php

require __DIR__ . '/../vendor/autoload.php';
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class HandleJWT {

    private static $key = "akf23w3r34rQ#O891-rh4";
    private static $algorithm = "HS256";

    public static function get_JWT_token($payload){
        return JWT::encode($payload, self::$key, self::$algorithm);
    }

    public static function decode_JWT_token($token){
        return JWT::decode($token, new Key(self::$key, self::$algorithm));
    }

    public static function getKey(){
        return self::$key;
    }
    public static function getAlgorithm(){
        return self::$algorithm;
    }
}
<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "dating_app_db");

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection->connect_error){
    die("Connection Failed " . $connection->connect_error);
}
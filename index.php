<?php

include "database.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json; charset=utf-8');

if(isset($_POST["name"]) && isset($_POST["password"])){
    $name = $_POST["name"];
    $pwd = $_POST["password"];
    echo json_encode([
        "message" => 'uploading is done!',
        "uploadedData" => $name . " " . $pwd
    ]);
}
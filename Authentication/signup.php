<?php

include("../database.php");
session_start();
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"])
&& isset($_POST["country"]) && isset($_POST["gender"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstName = $_POST["firstName"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $age = null;
    $lastName = null;
    $gender_id = null;
    if(isset($_POST["age"])){
        $age = $_POST["age"];
    }
    if(isset($_POST["lastName"])){
        $lastName = $_POST["lastName"];
    }
    if($gender == "male"){
        $gender_id = 1;
    }elseif( $gender == "female" ){
        $gender_id = 2;
    }else{
        $gender_id = 3;
    }

    $sql_query = $connection->prepare("INSERT INTO users (email, password, fistname, lastname, age, country, gender_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql_query->bind_param("ssssisi", $email, password_hash($password, PASSWORD_BCRYPT), $firstName, $lastName, $age, $country, $gender_id);

    if($sql_query->execute()){
        $_SESSION["logged_in"] = true;
        echo json_encode([
            "logged_in" => true
        ]);
    }else{
        $_SESSION["logged_in"] = false;
        echo json_encode([
            "error" => "creating new user process is failed!"
        ]);
    }
}else{
    echo json_encode([
        "error" => "Some uninserted fields are required!"
    ]);
}
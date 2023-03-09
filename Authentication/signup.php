<?php

include("../database.php");

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"]) && isset($_POST["country"]) && isset($_POST["gender"])){
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

    $sql_query = "INSERT INTO users (email, password, firstname, lastname, age, country, gender_id) VALUES (" . $email . ',' . $password . ',' . $firstName . "," . $lastName . "," . $age . "," . $country . "," . $gender_id . ")";

    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
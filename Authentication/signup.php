            <?php

include("../database.php");
include("../Validation/formValidation.php");

session_start();
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["firstName"])
&& isset($_POST["country"]) && isset($_POST["gender"])){
    $email = to_be_safe($_POST["email"]);
    $password = to_be_safe($_POST["password"]);
    $firstName = to_be_safe($_POST["firstName"]);
    $country = to_be_safe($_POST["country"]);
    $gender = to_be_safe($_POST["gender"]);
    $age = null;
    $lastName = null;
    $gender_id = null;
    if(!valid_email($email)){
        echo json_encode([
            "error" => "unvalid email"
        ]);
        die(); // equivalent to exit()
    }else if(!is_strong_password($password)){
        echo json_encode([
            "error" => "the password isn't strong enough! please make sure to follow the following criteria when choosing a strong pass: \n\n 1- The password should contain at least one capital letter.\n\n 2- The password should contain at least one special character. \n\n 3- The password should contain at least one number. \n\n 4- The password should consist of 8 characters at least."
        ]);
        die();
    }else if(!valid_name($firstName)){
        echo json_encode([
            "error" => "unvalid name"
        ]);
        die();
    }
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
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql_query = $connection->prepare("INSERT INTO users (email, password, fistname, lastname, age, country, gender_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql_query->bind_param("ssssisi", $email, $hashed_password, $firstName, $lastName, $age, $country, $gender_id);

    if($sql_query->execute()){
        echo json_encode( [
            "batata" => "potato"
        ]);
    }else{
        
    }
}else{
    echo json_encode([
        "error" => "Some uninserted fields are required!"
    ]);
}
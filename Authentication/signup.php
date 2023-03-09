            <?php

include("../database.php");
include("../Validation/formValidation.php");
include("../Authentication/jwt.php");

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
    }else if($gender != "male" && $gender != "female"){
        echo json_encode([
            "error" => "unvalid gender"
        ]);
        die();
    }
    if(isset($_POST["age"])){
        $age = to_be_safe($_POST["age"]);
    }
    if(isset($_POST["lastName"])){
        $lastName = $_POST["lastName"];
        if(!valid_name($lastName)){
            echo json_encode([
                "error" => "unvalid name"
            ]);
            die();
        }
    }
    if($gender == "male"){
        $gender_id = 1;
    }elseif( $gender == "female" ){
        $gender_id = 2;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql_query = $connection->prepare("INSERT INTO users (email, password, fistname, lastname, age, country, gender_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql_query->bind_param("ssssisi", $email, $hashed_password, $firstName, $lastName, $age, $country, $gender_id);
    $data = [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "email" => $email,
        "country" => $country,
        "age" => $age,
        "gender" => $gender
    ];
    if($sql_query->execute()){
        echo json_encode( [
            "token" => HandleJWT::get_JWT_token([$data["email"]]),
            "user" => $data
        ]);
    }else{
        echo json_encode( [
            "error" => "something went wrong!"
        ]);
    }
}else{
    echo json_encode([
        "error" => "Some uninserted fields are required!"
    ]);
}
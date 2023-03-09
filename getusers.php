<?php


include('connection.php');

// get user's id by their email.
//then plug the result in the user_preference table to get gender preference.


$user_email = $_GET['email'];
$sql = "SELECT gender_id FROM user_preference WHERE userID = (SELECT userID FROM users WHERE email = '$main_user_email')";
$result = mysqli_query($conn, $sql);
$preference = mysqli_fetch_assoc($result);
$preference_id = $preference['gender_id'];

// get users that match user's gender preference.
$sql = "SELECT * FROM users WHERE gender_id = $preference_id";
$result = mysqli_query($conn, $sql);

// return data as JSON
$users = array();
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
header('Content-Type: application/json');
echo json_encode($users);


?>
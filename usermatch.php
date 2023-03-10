<?php

include('connection.php');

$selfid = $_POST['user_id'];
$userid = $_POST['liked_user_id'];
//select the id's of the "liked_user's" liked users.
$sql = "SELECT liked_user_id FROM user_likes where user_id = $selfid";

$result = mysqli_query($conn, $sql);

// return data as JSON
$likedusers = array();
while ($likes = mysqli_fetch_assoc($result)) {
    $likedusers[] = $likes;
}
header('Content-Type: application/json');
echo json_encode($likedusers);


?>





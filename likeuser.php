<?php

include('connection.php');

$selfid = $GET['user_id'];
$userid = $_GET['liked_user_id'];

$sql = "SELECT liked_user_id FROM user_likes where userid = $selfid";
$result = mysqli_query($conn, $sql);


$likedusers = array();
while ($likes = mysqli_fetch_assoc($result)) {
    $likedusers[] = $likes;
}
header('Content-Type: application/json');
echo json_encode($likedusers);


?>





<?php

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "datingappdb";
$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
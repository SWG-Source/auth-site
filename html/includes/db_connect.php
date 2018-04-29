<?php
$host = "localhost";
$username = "root";
$password = "swg";
$db_name = "swgusers";
$mysqli = new mysqli($host, $username, $password, $db_name);
if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database.";
    exit;
}
?>

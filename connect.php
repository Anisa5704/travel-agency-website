<?php
//Database connection

$host = "localhost";
$user = "root";
$password = "";
$db="login";
$conn = new mysqli($host, $user, $password, $db);
if($conn->connect_error){
    echo "Failed to connect with Database".$conn->connect_error;
}

?>
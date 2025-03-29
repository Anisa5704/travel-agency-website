<?php
global $conn;
session_start();
include("connect.php");

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_array()) {
        echo "Përshëndetje, " . $row['fName'] . " " . $row['lName'] . "! Ju keni hyrë në llogarinë tuaj.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Homepage</title>
</head>
<body>
<div style="text-align: center; padding: 15%;">
    <p style="font-size: 50px; font-weight: bold;">
        Hello<?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            // Use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_array()) {
                echo $row['firstName'] . " " . $row['lastName'];
            }
        }
        ?>
        :)
    </p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
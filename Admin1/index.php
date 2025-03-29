<?php
require_once('C:/xampp/htdocs/Web2.1/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $name = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    $role = mysqli_real_escape_string($conn, trim($_POST['role']));

    if (empty($firstName) ||empty($lastName) || empty($email) || empty($role)|| empty($password)) {
        echo "All fields are required.";
        exit;
    }

    $email_check_query = "SELECT Id FROM users WHERE email = '$email'";
    $result_email_check = mysqli_query($conn, $email_check_query);

    if (!$result_email_check) {
        echo "Error while checking email: " . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result_email_check) > 0) {
        echo "This email is already registered.";
        exit;
    }

    $insert_query = "INSERT INTO users (firstName, lastName,email, role,password) VALUES ('$firstName', '$lastName','$email', '$role','$password')";
    $result_insert = mysqli_query($conn, $insert_query);

    if ($result_insert) {
        header("Location: listofusers.php");
        exit;
    } else {
        echo "Error while adding user: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

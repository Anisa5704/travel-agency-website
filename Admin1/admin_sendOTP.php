<?php
require 'C:\xampp\htdocs\Web2.1\connect.php';
require 'C:\xampp\htdocs\Web2.1\functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = validate($_POST['email']); //It uses validate function to 'clean' the input

    //Checks if the email exists in database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error while connection to SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999); //It generates a 6-digit OTP code

        //Updates OTP in database
        $sql_update = "UPDATE users SET otp = ? WHERE email = ?";
        $update_stmt = $conn->prepare($sql_update);
        if (!$update_stmt) {
            die("Error while connecting to SQL for update : " . $conn->error);
        }

        $update_stmt->bind_param("is", $otp, $email);
        $update_stmt->execute();

        //Sends OTP via email
        if (sendEmail($email, $otp)) {
            echo "Your OTP has been sent. Check your email.";
            echo '<br/><a href="admin_enterOTP.php">Enter your OTP to reset your password</a>';
        } else {
            echo "Error while sending the email.Try again.";
        }
    } else {
        echo "This email is not in our database or it is not valid.";
    }
} else {
    echo "Invalid request.";
}
?>
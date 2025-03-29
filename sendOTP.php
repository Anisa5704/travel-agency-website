<?php
require 'connect.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = validate($_POST['email']); // It uses validate functions to clean the input

    //Checks if the email exists in our database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error during SQL connection: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999); // 6-digit OTP generation

        //Updates OTP in the database
        $sql_update = "UPDATE users SET otp = ? WHERE email = ?";
        $update_stmt = $conn->prepare($sql_update);
        if (!$update_stmt) {
            die("Error while SQL update-ing " . $conn->error);
        }

        $update_stmt->bind_param("is", $otp, $email);
        $update_stmt->execute();

        //Sends OTP via email
        if (sendEmail($email, $otp)) {
            echo "Your OTP has been sent. Check your email.";
            echo '<br/><a href="enterOTP.php">Enter your OTP to reset your password</a>';
        } else {
            echo "Error while sending the email.Please try again.";
        }
    } else {
        echo "Email not found.";
    }
} else {
    echo "Invalid request.";
}
?>
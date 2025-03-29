<?php
include_once 'C:\xampp\htdocs\Web2.1\connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $new_password = $_POST["new_password"];
    $otp = filter_input(INPUT_POST, 'otp', FILTER_VALIDATE_INT);

    if ($otp === false) {
        die("Invalid OTP.");
    }

    // Hash-i i fjalëkalimit
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Përditësimi i fjalëkalimit dhe pastrimi i OTP-së
    $sql = "UPDATE users SET password = ?, otp = NULL WHERE otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $otp);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Password reset successfully. You can now <a href='admin.php'>log in</a>.";
    } else {
        echo "Failed to reset password. Please try again.";
    }
}
?>

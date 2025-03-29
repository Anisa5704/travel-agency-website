<?php
include_once 'connect.php';

//It gets OTP and the new password from the form

$new_password = $_POST["new_password"];
$otp = $_POST["otp"];

// Password hashing
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

//Updates the password for the specified OTP

$sql = "UPDATE users SET password = ?, otp = NULL WHERE otp = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $hashed_password, $otp);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Password reset successfully. You can now <a href='faqjaEpare.php'>log in</a>.";
} else {
    echo "Failed to reset password. Please try again.";
}
?>

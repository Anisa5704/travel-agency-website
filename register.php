
<?php
include 'connect.php';
include 'functions.php';

//When user signs up

if (isset($_POST['signUp'])) {
    //It gets the user's details
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    //Checks if the user has checked "Remember Me" and sets a cookie and it is saved for 30 days
    if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
        setcookie("email", $email, time() + (86400 * 30), "/");
    } else {
        setcookie("email", "", time() - 3600, "/"); // Cookie is deleted if it is not signed
    }

    // Password's hashing
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    //Creating a verification code
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    //Checks is the email is existing in the database
    $checkEmail = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email Already Exists!";
    } else {
        //Register the user in the database

        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashedPassword, $verification_code);

        if ($stmt->execute()) {
            //The email is sent for verification
            if (sendEmail($email, $verification_code)) {
                echo "Email i konfirmimit është dërguar!";
                header("Location: faqjaVerifikimit.php?email=" . urlencode($email));
                exit();
            } else {
                echo "Gabim në dërgimin e email-it të konfirmimit!";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>



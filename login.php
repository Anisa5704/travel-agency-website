<?php
session_start();
include 'connect.php';
include 'functions.php';

if (isset($_POST['signIn'])) {
    //It gets the user's details and sanitizes them
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']); //It cancels the empty spaces

    //It checks if all the fields are filled
    if (empty($email) || empty($password)) {
        echo "All fields are required!";
        exit();
    }

    //Checks if the user exists in the database
    $checkUser = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkUser);
    if ($stmt === false) {
        echo "Gabim në përgatitjen e SQL: " . $conn->error;
        exit();
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordHashed = $row['password'];

        //Checks the failed attempts , if they are more than 7 ,the user can not try again for 30 minutes
        if ($row['failed_attempts'] >= 7) {
            $lastAttempt = new DateTime($row['last_failed_attempt']);
            $now = new DateTime();
            $interval = $lastAttempt->diff($now);

            if ($interval->i < 30 && $interval->y == 0 && $interval->m == 0 && $interval->d == 0) {
                echo "You have reached the limit of failed attempts.Please try again after 30 minutes";
                exit();
            }
        }

        //Password verification
        if (password_verify($password, $passwordHashed)) {
            //It resets the failed attemps if the user gets the right password
            $resetAttempts = "UPDATE users SET failed_attempts = 0, last_failed_attempt = NULL WHERE email = ?";
            $stmt = $conn->prepare($resetAttempts);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            //Datas into session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['firstName'] . ' ' . $row['lastName'];

            // Tokens' creration
            if (isset($_POST['rememberMe'])) {
                $rememberToken = bin2hex(openssl_random_pseudo_bytes(16));
                $updateToken = "UPDATE users SET remember_token = ? WHERE email = ?";
                $stmt = $conn->prepare($updateToken);
                $stmt->bind_param("ss", $rememberToken, $email);
                $stmt->execute();

                //Tokens are set into the cookie
                setcookie("remember_token", $rememberToken, time() + (86400 * 30), "/"); // Cookie for 30 days
            }

            //Makes sure that session is true for security
            session_regenerate_id(true);

            // Redirect to homepage
            header("Location: home.php");
            exit();
        } else {
            // Register the failed attempt
            $updateAttempts = "UPDATE users SET failed_attempts = failed_attempts + 1, last_failed_attempt = NOW() WHERE email = ?";
            $stmt = $conn->prepare($updateAttempts);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            echo "Incorrect password!";
        }
    } else {
        echo "This email is already registered!";
    }

    // Closes declaration
    $stmt->close();
}

// Closes database connection
$conn->close();
?>


















<?php
//VERSIONI ME I MIRE
//session_start();
//include 'connect.php';
//
//if (isset($_POST['signIn'])) {
//    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
//    $password = trim($_POST['password']); // Trim to avoid unnecessary spaces
//
//    if (empty($email) || empty($password)) {
//        echo "Të gjitha fushat janë të detyrueshme!";
//        exit();
//    }
//
//    // Kontrollo nëse ekziston email-i në bazën e të dhënave
//    $checkUser = "SELECT * FROM users WHERE email = ?";
//    $stmt = $conn->prepare($checkUser);
//    if ($stmt === false) {
//        echo "Gabim në përgatitjen e SQL: " . $conn->error;
//        exit();
//    }
//
//    $stmt->bind_param("s", $email);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
//    if ($result->num_rows > 0) {
//        $row = $result->fetch_assoc();
//        $passwordHashed = $row['password'];
//
//        // Debugging
//        echo "Password i dërguar: '$password'<br>";
//        echo "Hash në databazë: '$passwordHashed'<br>";
//
//        // Kontrollo përputhjen e fjalëkalimit me hash-in
//        if (password_verify($password, $passwordHashed)) {
//            if ($row['is_verified'] == 1) {
//                $_SESSION['user_id'] = $row['id'];
//                $_SESSION['user_name'] = $row['firstName'] . ' ' . $row['lastName'];
//
//                // Rregjeneroni ID-në e sesionit për siguri
//                session_regenerate_id(true);
//
//                header("Location: home.php");
//                exit();
//            } else {
//                echo "Email-i juaj nuk është verifikuar. Ju lutemi kontrolloni kutinë tuaj të postës elektronike.";
//            }
//        } else {
//            echo "Fjalëkalimi nuk është i saktë!";
//        }
//    } else {
//        echo "Ky email nuk është regjistruar!";
//    }
//}
//?>














<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign In</title>
</head>

<body>

<div class="container">
    <div class="form-container sign-in">
        <form method="POST" action="login.php">
            <h1>Sign In</h1>
            <input type="email" placeholder="Email" name="email" id="email" required>
            <input type="password" placeholder="Password" name="password" id="signInPassword" required>
            <a href="#">Forget Your Password?</a>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
    </div>
</div>

<script src="script.js"></script>
</body>

</html>

-->
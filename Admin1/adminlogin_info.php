<?php
require_once('C:/xampp/htdocs/Web2.1/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND role = 'admin'";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        echo json_encode([
            "message" => "Email does not exist or is not an admin!"
        ]);
        exit();
    }

    $user = mysqli_fetch_assoc($result);

    //Checks if the failed attempts have reached the limit and if so , it blocks this user for 30 minutes
    if ($user['failed_attempts'] >= 7) {
        $lastAttempt = new DateTime($user['last_failed_attempt']);
        $now = new DateTime();
        $interval = $lastAttempt->diff($now);


        if ($interval->i < 30 && $interval->y == 0 && $interval->m == 0 && $interval->d == 0) {
            echo json_encode([
                "message" => "You have reached the maximum number of failed login attempts. Try again after 30 minutes."
            ]);
            exit();
        }
    }

    $hashedPassword = $user['password'];

    if (!password_verify($password, $hashedPassword)) {
        //Update the number of failed attempts and the last time
        $updateQuery = "UPDATE users SET failed_attempts = failed_attempts + 1, last_failed_attempt = NOW() WHERE email = '$email'";
        mysqli_query($conn, $updateQuery);

        echo json_encode([
            "message" => "Incorrect password!"
        ]);
        exit();
    }

    //Correct password, reset the failed attempts
    $resetAttemptsQuery = "UPDATE users SET failed_attempts = 0, last_failed_attempt = NULL WHERE email = '$email'";
    mysqli_query($conn, $resetAttemptsQuery);

    session_start();
    $_SESSION['Id'] = $user['Id'];
    $_SESSION['name'] = $user['firstName'] . " " . $user['lastName'];
    $_SESSION['email'] = $user['email'];


    header("Location: listofusers.php");
    exit();
} else {
    echo json_encode([
        "message" => "Warning! Invalid request!"
    ]);
    exit();
}
?>





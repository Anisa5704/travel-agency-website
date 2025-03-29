<?php
session_start();
include 'C:\xampp\htdocs\Web2.1\connect.php';
include 'C:\xampp\htdocs\Web2.1\functions.php';

if (isset($_POST['signIn'])) {
    //We get and sanitize the data
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    //Checks if all the fields are entered
    if (empty($email) || empty($password)) {
        echo "All the fields must be filled!";
        exit();
    }

    //Checks if the user exists
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
        $hashedPassword = $row['password'];
        $role = $row['role'];

        //Checks the failed attempts
        if ($row['failed_attempts'] >= 7) {
            $lastAttempt = new DateTime($row['last_failed_attempt']);
            $now = new DateTime();
            $interval = $lastAttempt->diff($now);

            //Checks if the user should be blocked or not
            if ($interval->i <30  && $interval->y == 0 && $interval->m == 0 && $interval->d == 0) {
                echo "You have reached the limit of failed attempts.Try again after 30 minutes.";
                exit();
            }
        }

        //Email verification
        if (password_verify($password, $hashedPassword)) {
            //Admin logic and sessions
            if ($role === 'admin') {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['is_admin'] = true;
                session_regenerate_id(true);

                //Tokens' creation for 'Remember Me'
                if (isset($_POST['rememberMe'])) {
                    $rememberToken = bin2hex(openssl_random_pseudo_bytes(16));
                    $updateToken = "UPDATE users SET remember_token = ? WHERE email = ?";
                    $stmt = $conn->prepare($updateToken);
                    $stmt->bind_param("ss", $rememberToken, $email);
                    $stmt->execute();

                    //Tokens into cookies
                    setcookie("remember_token", $rememberToken, time() + (86400 * 30), "/"); // Cookie for 30 days
                }

                //Check if the sessionis renovated
                session_regenerate_id(true);

                //If login is successful, reset the failed attempts in the database
                $resetAttempts = "UPDATE users SET failed_attempts = 0, last_failed_attempt = NULL WHERE email = ?";
                $resetStmt = $conn->prepare($resetAttempts);
                $resetStmt->bind_param("s", $email);
                $resetStmt->execute();
                $resetStmt->close();



                header("Location: adminlogin_info.php");
                exit();
            } else {
                echo "This user does not have admin access.";
                exit();
            }
        } else {
            //Increase the failed attempts number
            $updateAttempts = "UPDATE users SET failed_attempts = failed_attempts + 1, last_failed_attempt = NOW() WHERE email = ?";
            $updateStmt = $conn->prepare($updateAttempts);
            $updateStmt->bind_param("s", $email);
            $updateStmt->execute();
            $updateStmt->close();

            echo "Incorrect password!";
            exit();
        }
    } else {
        echo "Invalid email or password!.";
    }

    $stmt->close();
}

$conn->close();
?>


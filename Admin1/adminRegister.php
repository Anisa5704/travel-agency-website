<?php
include 'C:\xampp\htdocs\Web2.1\connect.php';
include 'C:\xampp\htdocs\Web2.1\functions.php';

if (isset($_POST['signUp'])) {
    // Merr të dhënat e përdoruesit dhe aplikon sanitizimin
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    // Kontrollo nëse është shënuar "Remember Me"
    if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
        setcookie("email", $email, time() + (86400 * 30), "/"); // Ruaj email për 30 ditë
    } else {
        setcookie("email", "", time() - 3600, "/"); // Hiq cookie nëse nuk është shënuar
    }

    // Hashimi i password-it
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Krijo një kod verifikimi
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    // Kontrollo nëse ekziston email-i në bazën e të dhënave
    $checkEmail = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email Already Exists!";
    } else {
        // Regjistro përdoruesin në bazën e të dhënave si admin
        $role = 'admin'; // Vendos rolin si 'admin'
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, verification_code, is_verified, role) 
                        VALUES (?, ?, ?, ?, ?, 0, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $hashedPassword, $verification_code, $role);

        if ($stmt->execute()) {
            // Dërgo email për verifikim
            if (sendEmail($email, $verification_code)) {
                echo "Email i konfirmimit është dërguar!";
                header("Location: admin_faqjaVerifikimit.php?email=" . urlencode($email));
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
